<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReferralController extends Controller
{
    //My Referral

    public function myReferral(Request $request)
    {
        try {
            $user = Auth::user();

            $myRef = DB::table('referrals')->where('user_id', $user->id)->first('code');
            return $this->responseWithSuccess('My Referral Code.', $myRef);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }

    //Use Referral

    public function useReferral(Request $request)
    {
        try {
            $user = Auth::user();
            $codeCheck = DB::table('referrals')->where('code', $request->ref);
            if ($this->appPass($request) === true) {
                if ($codeCheck->exists()) {
                    $refID = $codeCheck->value('id');
                    $refOwner = $codeCheck->value('user_id');
                    $refBonus = DB::table('settings')->where('content', 'ref_bonus')->value('value');
                    $useCheck = DB::table('reffer_used')->where('code', $request->ref)->where('receiver_id', $user->id);

                    if ($user->id === $refOwner) {
                        return $this->responseWithError("Can't use own referral code.");
                    } else {
                        if ($useCheck->exists()) {
                            return $this->responseWithError('You have already used the referral code.');
                        } else {

                            $useRef = DB::table('reffer_used')->insert([
                                "referral_id" => $refID,
                                "code" => $request->ref,
                                "receiver_id" => $user->id,
                            ]);
                            $addBonus = DB::table('balance')->where('user_id', $user->id);
                            $addBonus->increment('amount',$refBonus );
                            return $this->responseWithSuccess('Congratulations', $refBonus);

                        }
                    }

                } else {
                    return $this->responseWithError('Invalid referral code.');
                }
            } else {
                return $this->responseWithError('You must use Chashipolli App to use referral code.');
            }


            //  $myRef = DB::table('reffer_used')->where('user_id', $user->id)->first('code');


        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }
}
