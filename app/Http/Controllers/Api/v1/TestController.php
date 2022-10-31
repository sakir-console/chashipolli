<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestController extends Controller
{
    //multiple image up

    public function multiImage(Request $request)
    {

        $data = $request->all();
        $rules = [

          //  'photo' => 'required',
            'photo.*' => 'required|mimes:jpeg,jpg,png|max:19048'
        ];

        $response = $this->validateWithJSON($request->only('photo'), $rules);

        if ($response === true) {

                try {

                    $info = [];
                    $files = $request->file('photo');
                    foreach ($files as $index => $file) {
                        $ext = Str::lower($file->getClientOriginalExtension());//Display File Extension
                        $name = Str::random(14) . Str::limit($file->getClientOriginalName(), 1, '');  // File new Name
                        $file_name = $name . "." . $ext;  // Modified File Name
                        $success = $file->move(public_path('testup/'), $file_name); //Move Uploaded File(Upload_dir, File_name)
                        $fileData[] = $file_name; // Files name array

                        $img_data = [
                            'product_id' => 2,
                            'img_name' => $fileData[$index],
                        ];

                        if ($success) {
                            DB::table('test_imgs')->insert($img_data);
                            $info = count($fileData) . '  Image uploaded.';
                        }
                    }


                    return $this->responseWithSuccess('Inserted Successfully.', $data);

                } catch (\Exception $exception) {

                    return $this->responseWithError($exception->getMessage());

                }

        } else {

            return $this->responseWithError('Validation failed', $response);
        }

    }



}
