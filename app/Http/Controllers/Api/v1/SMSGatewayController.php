<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SMSGatewayController extends Controller
{
    //Send SMS
    public function sendSMS($msg,$contacts)
    {

        $url = "https://esms.mimsms.com/smsapi";
        $data = [
            "api_key" => "C200894961a3409345ec64.16014524",
            "type" => "text",
            "contacts" =>$contacts,
            "senderid" => "8809612436465",
            "msg" => $msg
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        //Response
            return $response;

    }




    public function sendMsg(Request $request)
    {
        $this->sendSMS($request->msg,$request->contacts);

    }

    //Signup OTP
    public function signupOTP(Request $request)
    {
        $rules = [

            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11|unique:users,phone',

        ];
        $response = $this->validateWithJSON($request->all(), $rules);
        if ($response === true) {

        $otp = rand(10000, 99999);
        $msg="প্রিয় গ্রাহক, আপনার চাষিপল্লী নিবন্ধন যাচাই কোড: CP-$otp";

        $check_otp=DB::table('otp_code')
            ->where('phone',$request->phone)
            ->whereDate('created_at', Carbon::now()->tz('Asia/Dhaka')->format('Y-m-d'))
            ->count();

        if($check_otp<=1){


            $response = $this->sendSMS($msg,$request->phone);

            $result= Str::contains($response,'SUBMITTED');

            if ($result){
                $store_otp=DB::table('otp_code')->insert([
                    "otp_code"=>$otp,
                    "phone"=>$request->phone,
                ]);

                return $this->responseWithSuccess('OTP has been sent.'.$check_otp);
            }else{
                return $this->responseWithError("Unable to send OTP","ERROR: $response");
            }

        }else{
            return $this->responseWithError("Cant send anymore OTP today. Try again tomorrow.","Cant send anymore OTP today.");

        }
        }

        return $this->responseWithError('Validation failed', $response);




    }




    public function resetOTP(Request $request)
    {
        $otp = rand(10000, 99999);
        $msg="প্রিয় গ্রাহক, আপনার চাষিপল্লী একাউন্ট পাসওয়ার্ড রিসেট কোড: CP-$otp";

        $check_otp=DB::table('otp_code')
            ->where('phone',$request->phone)
            ->whereDate('created_at', Carbon::now()->tz('Asia/Dhaka')->format('Y-m-d'))
            ->count();

        $check_user=DB::table('users')
            ->where('phone',$request->phone);

        if($check_user->exists()){
            if($check_otp<=1){
                $store_otp=DB::table('otp_code')->insert([

                    "otp_code"=>$otp,
                    "phone"=>$request->phone,
                ]);


                $response = $this->sendSMS($msg,$request->phone);

                $result= Str::contains($response,'SUBMITTED');

                if ($result){
                    return $this->responseWithSuccess('Reset OTP has been sent.'.$check_otp);
                }else{
                    return $this->responseWithError("Unable to send OTP","ERROR: $response");
                }

            }else{
                return $this->responseWithError("Cant send anymore OTP today. Try again tomorrow.");

            }
        }else{

            return $this->responseWithError("No account found.");

        }
    }




}
