<?php

use App\Http\Controllers\Api\v1\AddressController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\BalanceController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\CatsController;
use App\Http\Controllers\Api\v1\CheckoutController;
use App\Http\Controllers\Api\v1\CouponController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\PaymentController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\ReferralController;
use App\Http\Controllers\Api\v1\SliderController;
use App\Http\Controllers\Api\v1\SMSGatewayController;
use App\Http\Controllers\Api\v1\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Authenticated Views
Route::group(['prefix' => 'v1','middleware' => ['auth:sanctum']], function() {


    //Admin Controls----------
    //Category
    Route::post('/add/category',[CatsController::class,'addCategory']);
    Route::post('/update/category',[CatsController::class,'updateCategory']);
    Route::post('/delete/category',[CatsController::class,'deleteCategory']);
    //Sub-Category
    Route::post('/add/sub-category',[CatsController::class,'addSubCategory']);
    Route::post('/update/sub-category',[CatsController::class,'updateSubCategory']);
    Route::post('/delete/sub-category',[CatsController::class,'deleteSubCategory']);
    //Product
    Route::post('/add/product',[ProductController::class,'addProduct']);
    Route::post('/update/product',[ProductController::class,'updateProduct']);
    Route::post('/delete/product',[ProductController::class,'deleteProduct']);
    //Slider
    Route::post('/add/slider',[SliderController::class,'addSlider']);
    Route::post('/delete/slider',[SliderController::class,'deleteSlider']);
    //Coupon
    Route::post('/add/coupon',[CouponController::class,'addCoupon']);

    Route::post('/update/coupon',[CouponController::class,'updateCoupon']);
    Route::post('/delete/coupon',[CouponController::class,'deleteCoupon']);
    //User Controls----------
    Route::post('/logout',[AuthController::class,'logOut']);



    Route::get('/my/balance',[BalanceController::class,'myBalance']);
    Route::get('/my/addressbook',[AddressController::class,'myAddressBook']);
    Route::post('/update/addressbook',[AddressController::class,'updateMyAddressBook']);
    Route::post('/add/cart',[CartController::class,'addCart']);
    Route::post('delete/cart',[CartController::class,'deleteCart']);
    Route::get('/my/carts',[CartController::class,'cartList']);
    Route::get('/my/referral',[ReferralController::class,'myReferral']);
    Route::post('/use/referral',[ReferralController::class,'useReferral']);
    Route::post('/checkout',[CheckoutController::class,'checkout']);
    Route::post('/payment',[PaymentController::class,'paymentInfo']);
    Route::post('/payment/success',[PaymentController::class,'paymentSuccess']);
    Route::post('/payment/fail',[PaymentController::class,'paymentFail']);
    Route::post('/payment/cancel',[PaymentController::class,'paymentCancel']);
    Route::post('/order',[OrderController::class,'makeOrder']);
    Route::post('/orderset',[OrderController::class,'orderSet']);
    Route::get('/order/products',[OrderController::class,'orderProductList']);
    Route::post('/orders',[OrderController::class,'orderList']);
    Route::post('/myorders',[OrderController::class,'myOrders']);

});

//Public views
Route::group(['prefix' => 'v1'], function() {
    Route::post('/testReq',[TestController::class,'multiImage']);
    Route::post('/signup',[AuthController::class,'signUp']);
    Route::post('/signin',[AuthController::class,'signIn']);
    Route::post('/otp',[SMSGatewayController::class,'signupOTP']);
    Route::post('/reset-otp',[SMSGatewayController::class,'resetOTP']);
    Route::post('/reset-password',[AuthController::class,'resetPassword']);
    Route::post('/verify-otp',[SMSGatewayController::class,'verifyOTP']);
    Route::get('/view/coupon',[CouponController::class,'viewCoupon']);
    Route::get('/view/sliders',[SliderController::class,'viewSlider']);
    Route::get('/view/product',[ProductController::class,'viewProduct']);
    Route::get('/view/categories',[CatsController::class,'categoryList']);
    Route::get('/view/sub-categories',[CatsController::class,'subcategoryList']);


});




