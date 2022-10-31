<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{

    //View my Balance
    public function myBalance()
    {
        $user = Auth::user();

        try {
            $view = DB::table('balance')->where('user_id', $user->id)->get();
            return $this->responseWithSuccess('Successfully Balance fetched.', $view);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }


}
