<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    //Add Coupon
    public function addCoupon(Request $request)
    {

        $rules = [
            'code' => 'string|required|unique:coupons,code',
            'amount' => 'numeric|between:0,99.99|required',
            'percent' => 'integer|required|max:5',
        ];

        $response = $this->validateWithJSON($request->only('code', 'amount', 'percent'), $rules);
        if ($this->adminPass() === true) {

            if ($response === true) {

                try {

                    $newCategory = DB::table('coupons')->insert([
                        "code" => $request->code,
                        "amount" => $request->amount,
                        "percentage" => $request->percent,
                    ]);

                    return $this->responseWithSuccess('New Coupon Successfully added.');

                } catch (\Exception $exception) {

                    return $this->responseWithError($exception->getMessage());

                }

            } else {

                return $this->responseWithError('Validation failed', $response);
            }

        } else {
            return $this->responseWithError('Access denied.');
        }

    }




    //View coupons
    public function viewCoupon()
    {
        try {
            $view = DB::table('coupons')->get();
            return $this->responseWithSuccess('Coupon successfully fetched.', $view);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }





    //Update Coupon
    public function updateCoupon(Request $request)
    {

        $rules = [
            'coupon_id' => 'integer|required',
            'amount' => 'numeric|between:0,99.99|required',
            'percent' => 'integer|required|max:5',
        ];

        $response = $this->validateWithJSON($request->only('code', 'amount', 'percent', 'coupon_id'), $rules);
        if ($this->adminPass() === true) {

            if ($response === true) {

                try {

                    $newCategory = DB::table('coupons')->where('id', $request->coupon_id)->update([
                        "amount" => $request->amount,
                        "percentage" => $request->percent,
                    ]);

                    return $this->responseWithSuccess('Coupon updated Successfully.');

                } catch (\Exception $exception) {

                    return $this->responseWithError($exception->getMessage());

                }

            } else {

                return $this->responseWithError('Validation failed', $response);
            }

        } else {
            return $this->responseWithError('Access denied.');
        }

    }


    //Delete Coupon
    public function deleteCoupon(Request $request)
    {


        if ($this->adminPass() === true) {
            try {

                $couponDelete = DB::table('coupons')->whereId($request->coupon_id)->delete();

                if ($couponDelete) {
                    return $this->responseWithSuccess('Coupon deleted Successfully.');
                } else {
                    return $this->responseWithError("Couldn't delete.");
                }


            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());

            }
        } else {
            return $this->responseWithError('Your not allowed.');
        }


    }


}
