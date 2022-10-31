<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Nette\Utils\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // Validation Helper
    protected function validateWithJson($data = [], $rules = [])
    {
        $validator = Validator::make($data, $rules);

        if ($validator->passes()) {
            return true;
        }
        return $validator->getMessageBag()->all();
    }


    // Success Result
    protected function responseWithSuccess($message = '', $data = [], $display = [], $code = 200)
    {

        return response()->json([
            'result' => true,

            'message' => $message,
            'data' => $data ?? "No data available",
            'display' => $display,
        ], $code,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);

    }

    //Failure Result
    protected function responseWithError($message = '', $data = [], $code = 400)
    {
        return response()->json([
            'result' => false,
            'message' => $message,
            'data' => $data
        ], $code,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);

    }


    // Admin pass Helper
    protected function adminPass()
    {
        if (Auth::user()->tokenCan('role:admin')) {
            return true;
        }
        return false;
    }


    // App pass Helper
    protected function appPass($request)
    {
        $checkApp=$request->CPapp;
        if ($checkApp==='786') {
            return true;
        }
        return false;
    }


    // OTP verification
    public function verifyOTP($contacts,$otp)
    {

        $check_otp=DB::table('otp_code')
            ->where('phone',$contacts)
            ->latest('id') ->value('otp_code');

        if ($check_otp===$otp){
            return true;
        }
        return false;
    }








    //Rough::::::Multiple Image Upload
    public function imgUploadmultiple(Request $request)
    {

        $data = $request->all();
        $rules = [
            //'imageFile.*' => 'required',
            'imageFile.*' => 'required|mimes:jpeg,jpg,png|max:2048'
        ];

        $response = $this->validateWithJSON($request->only('imageFile'), $rules);

        if ($response === true) {

            try {


                if ($request->hasFile('imageFile')) {
                    $info = [];
                    $files = $request->file('imageFile');
                    foreach ($files as $index => $file) {
                        $ext = $file->getClientOriginalExtension();//Display File Extension
                        $name = Str::random(14) . Str::limit($file->getClientOriginalName(), 1, '');  // File new Name
                        $file_name = $name . "." . $ext;  // Modified File Name
                        $success = $file->move(public_path('uploads/image/'), $file_name); //Move Uploaded File(Upload_dir, File_name)
                        $fileData[] = $file_name; // Files name array

                        $img_data = [
                            'product_id' => 6,
                            'img_name' => $fileData[$index],
                        ];

                        if ($success) {
                            DB::table('product_imgs')->insert($img_data);
                            $info['count'] = count($fileData);
                        }
                    }
                    return $this->responseWithSuccess($info['count'] . ' Image Uploaded Successfully ');

                } else {

                    return $this->responseWithError('Select Image first', $response);
                }


            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());

            }

        } else {

            return $this->responseWithError('Validation failed', $response);
        }

    }

    //Image(single) Upload Helper
    protected function imageUpload($request, $ImageName, $uploadDir)
    {
        if ($request->hasFile($ImageName)) {
            $Image = $request->file($ImageName);
            $ext = Str::lower($Image->getClientOriginalExtension());//Display File Extension
            $name = Str::random(15) . Str::limit($Image->getClientOriginalName(), 1, '');  // File new Name
            $file_name = $name . "." . $ext;  // Modified File Name
            $success = $Image->move(public_path('uploads/images/' . $uploadDir . '/'), $file_name); //Move Uploaded File(Upload_dir, File_name)

            if ($success) {
                return $file_name;
            } else {
                return false;
            }
        } else {
            return 'Select Image first';
        }

    }


    //#Data Search # Filter as Cat, subCat,Top--Sold,price
    protected function Filter($query, $request)
    {
        //----single product
        if ($request->id) {
            $query->where('id', $request->id);
        }
        //----Search
        if ($request->s) {
            $query->where('name', 'LIKE', '%' . $request->s . '%');
        }
        //---- Category wise
        if ($request->cat) {
            $query->where('category_id', $request->cat);
        }
        //----Sub-Category wise
        if ($request->subcat) {
            $query->where('_sub_category_id', $request->subcat);
        }  //----User wise
        if ($request->UserId) {
            $query->where('user_id', $request->UserId);
        }
        //----Payment wise
        if ($request->paystat) {
            $query->where('payment_status', $request->paystat);
        }
        //----Delivery wise
        if ($request->delvstat) {
            $query->where('delivery_status', $request->delvstat);
        }
        //----Top== sold,price
        if ($request->top) {
            switch ($request->top) {
                case('off'):
                    $query->orderBy(DB::raw("`price` - `special_price`"), 'desc');
                    break;
                case('sold'):
                    $query->orderBy('sold_count', 'desc');
                    break;
                case('price'):
                    $query->orderBy('price', 'desc');
                    break;
                case('new'):
                    $query->orderBy('id', 'desc');
                    break;
                default:

            }
        }

        $total = $query->count();
        $limit = $request->limit ?: 6;
        $page = $request->page && $request->page > 0 ? $request->page : 1;
        $offsetValue = ($page - 1) * $limit;
        $result = $query->offset($offsetValue)->orderBy('id', 'DESC')->limit($limit)->get();

        $display = [
            "per_page" => $limit,
            "current_page" => $page,
            "last_page" => ceil($total / $limit),
            "total" => $total,
        ];
        return array('data' => $result, 'disp' => $display);
    }


}
