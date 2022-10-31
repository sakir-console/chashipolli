<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //Add to Cart
    public function addCart(Request $request)
    {

        $rules = [
            'product_id' => 'int|required',
            'qty' => 'int|required'
        ];

        $response = $this->validateWithJSON($request->only('product_id', 'qty'), $rules);

        if ($response === true) {

            try {
                $product_id = $request->product_id;
                $qty = $request->qty;
                $user = Auth::user();

                //$newCategory = Cart::all();
                $single_price = DB::table('products')->where('id', $product_id)->value('price');
                $special_price = DB::table('products')->where('id', $product_id)->value('special_price');
        //        echo $user->id;
                if (Cart::where('user_id', $user->id)->where('product_id', $product_id)->exists()) {
                    $addMore = Cart::where('user_id', $user->id)->where('product_id', $product_id);
                    $addMore->increment('count', $qty);

                    $addSold=DB::table('products')->where('id', $product_id)->increment('sold_count', $qty);

                } else {

                    $newCart = DB::table('carts')->insert([
                        "user_id" => $user->id,
                        "product_id" => $product_id,
                        "count" => $qty,
                        "single_price" => $special_price ?? $single_price

                    ]);
                    $addSold=DB::table('products')->where('id', $product_id)->increment('sold_count', $qty);

                }

                return $this->responseWithSuccess('Product added to cart.');

            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());

            }

        } else {

            return $this->responseWithError('Validation failed', $response);
        }


    }


    //My Cart List
    public function cartList(Request $request)
    {
        try {

            $user = Auth::user();

            $viewCart = Cart::with('productInfo', 'imgs')->where('user_id', $user->id);

            $myCartList = $viewCart->get()->map(function ($view) {
                return [
                    "user_id" => $view->user_id,
                    "cart_id" => $view->id,
                    "product_id" => $view->product_id,
                    "quantity" => $view->count,
                    "product_name" => $view->productInfo->name,
                    "single_price" => $view->productInfo->price,
                    "special_price" => $view->productInfo->special_price,
                    "unit" => $view->productInfo->unit,
                    "description" => $view->productInfo->description,
                    "stock" => $view->productInfo->stock,
                    "images" => $view->imgs,

                ];
            });


            return $this->responseWithSuccess('My cart list.', $myCartList);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }




    //Delete Category
    public function deleteCart(Request $request)
    {


            try {
                $user = Auth::user();

                $cartCheck = DB::table('carts')->where('user_id', $user->id)->where('product_id',$request->product_id)->exists();

                if ($cartCheck) {
                    $catDelete = DB::table('carts')->where('user_id', $user->id)->where('product_id',$request->product_id)->delete();

                    return $this->responseWithSuccess('Cart removed Successfully.');
                } else {
                    return $this->responseWithError("Couldn't remove.");
                }


            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());

            }



    }











}
