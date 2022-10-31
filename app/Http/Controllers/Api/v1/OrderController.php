<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    //Take order

    public function orderSet(Request $request)
    {
        $data = $request->all();


        if ($this->adminPass() === true) {
            try {
                $user = Auth::user();

                $updateProduct = DB::table('orders')
                    ->where('id', $request->orderId)
                    ->update([
                        'payment_status' => $request->paystat,
                        'delivery_status' => $request->delstat,
                    ]);

                return $this->responseWithSuccess('Order updated Successfully.');

            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());

            }
        } else {
            return $this->responseWithError('Your not allowed.');
        }
    }


    public function makeOrder(Request $request)
    {
        try {

            $user = Auth::user();
            $microtime = md5(microtime());
            $invid = Str::random(6) . Str::limit($microtime, 6, '');

            $lastOrder = Order::orderBy('id', 'desc')->first();
            if (isset($lastOrder)) {
                // Sum 1 + last id
                $orderNumber = 'CP-0000' . ($lastOrder->id + 1) . '-' . date('Y');
            } else {
                $orderNumber = 'CP-00001-' . date('Y');
            }
            $cartProducts = DB::table('carts')->where('user_id', $user->id);
            if ($cartProducts->exists()) {


                //Checkout amount
                $checkout_amount = DB::table('checkout_amount')->where('user_id', $user->id)->value('amount');


                $newOrderID = DB::table('orders')->insertGetId([
                    "user_id" => $user->id,
                    "order_number" => $orderNumber,
                    "invoice_id" => $invid,
                    "price" => $checkout_amount
                ]);



                //$moveToOrder=null;
                $cartProducts = DB::table('carts')->where('user_id', $user->id)->get()->toArray();
                foreach ($cartProducts as $cartProduct) {
                    $moveToOrder = DB::table('order_products')->insert([
                        "order_id" => $newOrderID,
                        "product_id" => $cartProduct->product_id,
                        "quantity" => $cartProduct->count,
                        "single_price" => $cartProduct->single_price,
                    ]);

                }

                if (isset($moveToOrder)) {
                    $DeleteCartProducts = DB::table('carts')->where('user_id', $user->id)->delete();
                }

              //Checkout amount
                $coup_code = DB::table('checkout_amount')->where('user_id', $user->id)->value('coupon_code');


                if ($coup_code !== null) {

                    $usedCoupon = DB::table('coupon_used')->insert([
                        "user_id" => $user->id,
                        "code" => $coup_code
                    ]);
                }

                if ($newOrderID) {
                    $makeBalZero = DB::table('balance')->where('user_id', $user->id)->update(["amount" => 0]);
                    $makeCKTZero = DB::table('checkout_amount')->where('user_id', $user->id)->update(["amount" => 0,"coupon_code"=>null]);
                }



                $return_data = [
                    "invoice_id" => $invid,
                    "price" => $checkout_amount
                ];
                return $this->responseWithSuccess('Order added.', $return_data);

            } else {

                return $this->responseWithError('Add to cart first.', 'No product found on your cart.');
            }


        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }


    //Order product List
    public function orderList(Request $request)
    {
        try {

            $user = Auth::user();

            $query = Order::with('userInfo');

            $view = $this->Filter($query, $request);

            $data = $view['data']->map(function ($view) {
                return [
                    "order_id" => $view->id,
                    "user_id" => $view->user_id,
                    "user_name" => $view->userInfo->name,
                    "user_phone" => $view->userInfo->phone,
                    "payment_id" => $view->payment_id,
                    "order_number" => $view->order_number,
                    "invoice_id" => $view->invoice_id,
                    "price" => $view->price,
                    "payment_status" => $view->payment_status,
                    "delivery_status" => $view->delivery_status,
                    "Created" => explode(' ', $view->userInfo->created_at)[0]


                ];
            });
            if ($data) {
                return $this->responseWithSuccess('Order list', $data, $view['disp']);
            }


        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }

    //Order product List
    public function myOrders(Request $request)
    {
        try {

            $user = Auth::user();

            $query = Order::with('userInfo')->where('user_id', $user->id);

            $view = $this->Filter($query, $request);

            $data = $view['data']->map(function ($view) {
                return [
                    "order_id" => $view->id,
                    "user_id" => $view->user_id,
                    "user_name" => $view->userInfo->name,
                    "user_phone" => $view->userInfo->phone,
                    "payment_id" => $view->payment_id,
                    "order_number" => $view->order_number,
                    "invoice_id" => $view->invoice_id,
                    "price" => $view->price,
                    "payment_status" => $view->payment_status,
                    "delivery_status" => $view->delivery_status,
                    "Created" => explode(' ', $view->userInfo->created_at)[0]


                ];
            });
            if ($data) {
                return $this->responseWithSuccess('Order list', $data, $view['disp']);
            }


        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }

    //Order product List
    public function orderProductList(Request $request)
    {
        try {

            $user = Auth::user();



            $query = Order::with('userInfo')
                ->where('id', $request->OId)
                ->where('user_id', $user->id);

            $view = $this->Filter($query, $request);

            $data['OrderInfo'] = $view['data']->map(function ($view) {
                return [
                    "order_id" => $view->id,
                    "user_id" => $view->user_id,
                    "user_name" => $view->userInfo->name,
                    "user_phone" => $view->userInfo->phone,
                    "payment_id" => $view->payment_id,
                    "order_number" => $view->order_number,
                    "invoice_id" => $view->invoice_id,
                    "price" => $view->price,
                    "payment_status" => $view->payment_status,
                    "delivery_status" => $view->delivery_status,
                    "Created" => explode(' ', $view->userInfo->created_at)[0]


                ];
            });


            $viewOrderList = OrderProduct::with('productInfo', 'imgs')->where('order_id', $request->OId);

            $data['ProductList'] = $viewOrderList->get()->map(function ($view) {
                return [
                    "product_id" => $view->product_id,
                    "quantity" => $view->quantity,
                    "product_name" => $view->productInfo->name,
                    "single_price" => $view->productInfo->price,
                    "special_price" => $view->productInfo->special_price,
                    "unit" => $view->productInfo->unit,
                    "description" => $view->productInfo->description,
                    "stock" => $view->productInfo->stock,
                    "images" => $view->imgs,
                ];
            });


            /*
                        [
                            "product_id" => $view->product_id,
                            "quantity" => $view->quantity,
                            "product_name" => $view->productInfo->name,
                            "single_price" => $view->productInfo->price,
                            "special_price" => $view->productInfo->special_price,
                            "unit" => $view->productInfo->unit,
                            "description" => $view->productInfo->description,
                            "stock" => $view->productInfo->stock,
                            "images" => $view->imgs,
                        ];*/

            return $this->responseWithSuccess('Ordered Product list.', $data);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }


}
