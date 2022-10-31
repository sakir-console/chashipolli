<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Sign Up

    public function signUp(Request $request)
    {
        $rules = [
            'name' => 'string|required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11|unique:users,phone',
            'password' => 'required|min:6',
            'otpCode'=>'required'
        ];

        $response = $this->validateWithJSON($request->all(), $rules);
        $otpVerify = $this->verifyOTP($request->phone, $request->otpCode);
        $data = [];


        if ($response === true) {
        if($otpVerify===true){

            try {

                $user = new User;
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->password = bcrypt($request->password);
                $user->save();
                $last_user = $user->id;
                $microtime = md5(microtime());
                $refid = Str::random(5) . Str::limit($microtime, 4, '');

                $token = $user->createToken('Token', ['role:member'])->plainTextToken;
                $data['message'] = 'Successfully Created.';
                $data['otp'] = "OTP Verified Successfully";
                $data['token'] = $token;
                $data['inputed'] = $request->all();

                $insertAddressRow = DB::table('address_books')->insert([
                    "user_id" => $last_user,
                    "full_name" => '',
                    "email" => '',
                    "full_address" => ''
                ]);

                $welcomeBonus = DB::table('balance')->insert([
                    "user_id" => $last_user,
                    "amount" => '10'
                ]);
                $checkoutAmount = DB::table('checkout_amount')->insert([
                    "user_id" => $last_user,
                    "amount" => '0'
                ]);

                $createRef = DB::table('referrals')->insert([
                    "user_id" => $last_user,
                    "code" => $refid
                ]);
                if ($insertAddressRow) {
                    $data['addressBook'] = "Address Book Created";
                }

                if ($welcomeBonus) {
                    $data['bonus'] = "Welcome bonus added for signup.";
                }
                if ($createRef) {
                    $data['bonus'] = "User Referral created.";
                }

                return $this->responseWithSuccess('Registration successful', $data);

            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());
            }


        }else{
            return $this->responseWithError('OTP verification failed.');
        }}

        return $this->responseWithError('Validation failed', $response);

    }

   //Sign In
    public function signIn(Request $request)
    {

        $rules = [
            'phone' => 'string|required',
            'password' => 'string|required|min:6'
        ];

        $response = $this->validateWithJSON($request->all(), $rules);
        $data = [];


        if ($response === true) {

            try {
                if (Auth::attempt([
                    'phone' => $request->phone,
                    'password' => $request->password,
                    'id' => [1, 2]

                ])) {

                    $user = Auth::user();
                    $token = $user->createToken('Token', ['role:admin'])->plainTextToken;

                    $data['admin'] = true;
                    $data['user'] = $user;
                    $data['token'] = $token;
                    return $this->responseWithSuccess('Admin Login successful', $data);

                } elseif (Auth::attempt([
                    'phone' => $request->phone,
                    'password' => $request->password
                ])) {

                    $user = Auth::user();
                    $token = $user->createToken('Token', ['role:customer'])->plainTextToken;

                    $data['admin'] = false;
                    $data['user'] = $user;
                    $data['token'] = $token;

                    return $this->responseWithSuccess('Login successful', $data);
                } else {

                    return $this->responseWithError('Invalid Credentials');

                }


            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());
            }
        }

        return $this->responseWithError('Validation failed', $response);
    }




    //Change password



    public function resetPassword(Request $request)
    {
        $rules = [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:11',
            'new_password' => 'required|min:6',
            'otpCode'=>'required'
        ];

        $response = $this->validateWithJSON($request->all(), $rules);
        $otpVerify = $this->verifyOTP($request->phone, $request->otpCode);
        $data = [];


        if ($response === true) {


            if($otpVerify===true){

                try {

                    User::where('phone', $request->phone)
                        ->update(['password' => Hash::make($request->new_password)]);


                    $data['otp'] = "OTP Verified Successfully";

                    return $this->responseWithSuccess('Password changed successful', $data);

                } catch (\Exception $exception) {

                    return $this->responseWithError($exception->getMessage());
                }


            }else{
                return $this->responseWithError('OTP verification failed.');
            }}

        return $this->responseWithError('Validation failed', $response);

    }







}
