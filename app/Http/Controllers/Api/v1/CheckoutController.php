<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //Checkout

    public function checkout(Request $request)
    {
        try {

            $user = Auth::user();
            //Shipping Cost
            $shippingCost = DB::table('settings');

            if (($request->near_shipping) === '1') {
                $shippingCost = $shippingCost->where('content', 'near_shipping_cost')->value('value');
            } else {
                $shippingCost = $shippingCost->where('content', 'far_shipping_cost')->value('value');
            }

            //Sub total
            $subTotal = Cart::where('user_id', $user->id)->sum(DB::raw('single_price*count'));
            //Remaining Bonus
            $bonus_balance = DB::table('balance')->where('user_id', $user->id)->value('amount');

            //Coupon check_query
            $couponCheck = DB::table('coupons')->where('code', $request->coupon);
            //Coupon's Amount
            $disAmount = $couponCheck->value('amount');
            //Check Coupon's %/TK
            $ifPercent = $couponCheck->value('percentage');
            //Check coupon's usage
            $useCheck = DB::table('coupon_used')->where('code', $request->coupon)->where('user_id', $user->id);


            $order['sub_total'] = $subTotal;
            $order['shipping'] = $shippingCost;
            $order['total'] = $subTotal + $shippingCost;
            $order['bonus_balance'] = $bonus_balance;
            $order['final_cost'] = $order['total'] - $bonus_balance;
            $order['payment_amount'] = $order['final_cost'];
            $order['coupon_used'] = 0;

            // if ($this->appPass($request) === true) {
            if ($subTotal !== 0) {


                if ($request->has('coupon')) {
                    if ($couponCheck->exists()) {

                        if ($useCheck->exists()) {
                            DB::table('checkout_amount')->where('user_id', $user->id)->update([
                                "amount" => $order['payment_amount']
                            ]);
                            return $this->responseWithError('You have already used this Coupon.', $order);
                        } else {
                            $order['coupon_used'] = 1;
                            DB::table('checkout_amount')->where('user_id', $user->id)->update([
                                "coupon_code" => $request->coupon
                            ]);
                            $order['discount_amount'] = $ifPercent === 1 ? $disAmount . '%' : $disAmount . ' TK.';
                            if ($ifPercent == 1)
                                $order['payment_amount'] = $order['final_cost'] - ($order['final_cost'] * $disAmount) / 100;
                            else
                                $order['payment_amount'] = $order['final_cost'] - $disAmount;
                        }
                    } else {
                        DB::table('checkout_amount')->where('user_id', $user->id)->update([
                            "amount" => $order['payment_amount']
                        ]);
                        return $this->responseWithError('Invalid Coupon code.', $order);
                    }
                } else {
                    DB::table('checkout_amount')->where('user_id', $user->id)->update([
                        "amount" => $order['payment_amount'],
                        "coupon_code" => null
                    ]);
                    return $this->responseWithSuccess('Checkout ', $order);
                }
                DB::table('checkout_amount')->where('user_id', $user->id)->update([
                    "amount" => $order['payment_amount']
                ]);
                return $this->responseWithSuccess('Checkout', $order);


            } else {

                return $this->responseWithError('Invalid checkout!Add to cart first.',);
            }

            /*} else {
                DB::table('checkout_amount')->where('user_id', $user->id)->update([
                    "amount"=>$order['payment_amount']
                ]);
                return $this->responseWithError('You must use Chashipolli App to use referral code.');
            }*/


        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }

    public function insertCoupon(Request $request)
    {

    }


}
