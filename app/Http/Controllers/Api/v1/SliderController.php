<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    //Add Slider
    public function addSlider(Request $request)
    {

        $data = $request->all();
        $rules = [
            'slider_image' => 'required',
            'slider_image.*' => 'mimes:jpeg,jpg,png|max:1048'
        ];

        $response = $this->validateWithJSON($request->only('slider_image'), $rules);

        if ($response === true) {
            if ($this->adminPass() === true) {
                try {
                    $uploadImage = $this->imageUpload($request, 'slider_image', 'Sliders');
                    if ($uploadImage) {
                        $success = DB::table('sliders')->insert([
                            "img_name" => $uploadImage
                        ]);
                        if ($success) {
                            return $this->responseWithSuccess('Slider Added Successfully ');
                        } else {
                            return $this->responseWithError('Could not add slider.', $response);
                        }
                    } else {
                        return $this->responseWithError('Could not upload slider Image.', $response);
                    }
                } catch (\Exception $exception) {

                    return $this->responseWithError($exception->getMessage());

                }
            } else {
                return $this->responseWithError('Your not allowed.');
            }

        } else {

            return $this->responseWithError('Validation failed', $response);
        }

    }

    //View sliders
    public function viewSlider()
    {
        try {
            $view = DB::table('sliders')->get();
            return $this->responseWithSuccess('Slider successfully fetched.', $view);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }

    //Add Slider
    public function deleteSlider(Request $request)
    {
        if ($this->adminPass() === true) {
            try {


                $selected = DB::table('sliders')->whereId($request->slider_id)->first()->img_name;
                if ($selected) {
                    $productDelete = DB::table('sliders')->whereId($request->slider_id)->delete();
                    unlink(public_path('uploads/images/Sliders/'.$selected));
                    return $this->responseWithSuccess('Slider deleted Successfully.');
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
