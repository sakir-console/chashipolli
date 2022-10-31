<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class ProductController extends Controller
{
    //Add Product
    public function addProduct(Request $request)
    {

        $data = $request->all();
        $rules = [
            'cat_id' => 'required',
            'sub_cat_id' => 'required',
            'product_name' => 'string|required',
            'price' => 'integer|required',
            'stock' => 'integer|required',
            'unit' => 'string|max:100',
            'description' => 'string|max:1970',
            'active' => 'required',
            'productImage' => 'required',
            'productImage.*' => 'mimes:jpeg,jpg,png|max:2048'
        ];

        $response = $this->validateWithJSON($request->only('cat_id', 'sub_cat_id', 'product_name', 'price', 'stock', 'unit', 'description', 'active', 'productImage'), $rules);

        if ($response === true) {

            if ($this->adminPass() === true) {
                try {
                    $insertedProductID = DB::table('products')->insertGetId([
                        'category_id' => $request->cat_id,
                        '_sub_category_id' => $request->sub_cat_id,
                        'name' => $request->product_name,
                        'price' => $request->price,
                        'special_price' => $request->special_price,
                        'stock' => $request->stock,
                        'unit' => $request->unit,
                        'description' => $request->description,
                        'active' => $request->active
                    ]);

                    $info = [];
                    $files = $request->file('productImage');
                    foreach ($files as $index => $file) {
                        $ext = Str::lower($file->getClientOriginalExtension());//Display File Extension
                        $name = Str::random(14) . Str::limit($file->getClientOriginalName(), 1, '');  // File new Name
                        $file_name = $name . "." . $ext;  // Modified File Name
                        $success = $file->move(public_path('uploads/images/products'), $file_name); //Move Uploaded File(Upload_dir, File_name)
                        $fileData[] = $file_name; // Files name array

                        $img_data = [
                            'product_id' => $insertedProductID,
                            'img_name' => $fileData[$index],
                        ];

                        if ($success) {
                            DB::table('product_imgs')->insert($img_data);
                            $info = count($fileData) . ' product Image uploaded.';
                        }
                    }


                    return $this->responseWithSuccess('Product added Successfully.', $info);

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

    //View Product
    public function viewProduct(Request $request)
    {
        try {

            $query = Product::with('imgs');

            $view = $this->Filter($query, $request);

            $data = $view['data']->map(function ($view) {
                return [
                    "id" => $view->id,
                    "cat_id" => $view->category_id,
                    "sub_cat_id" => $view->_sub_category_id,
                    "name" => $view->name,
                    "price" => $view->price,
                    "special_price" => $view->special_price,
                    "discount" => $view->price- $view->special_price,
                    "unit" => $view->unit,
                    "description" => $view->description,
                    "stock" => $view->stock,
                    "sold_count" => $view->sold_count,
                    "images" => $view->imgs
                ];
            });
            if ($data) {
                return $this->responseWithSuccess('Products list', $data, $view['disp']);
            }
        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }

    //Update Product
    public function updateProduct(Request $request)
    {

        $data = $request->all();
        $rules = [
            //'cat_id' => 'required',
            //'sub_cat_id' => 'required',
            'product_name' => 'string|required',
            'price' => 'integer|required',
            'special_price' => 'integer',
            'stock' => 'integer|required',
            'unit' => 'string|max:100',
            'description' => 'string|max:1970',
            //'active' => 'required',
            // 'productImage' => 'required',
            'productImage.*' => 'mimes:jpeg,jpg,png|max:2048'
        ];

        $response = $this->validateWithJSON($request->only('product_name', 'price', 'stock', 'unit', 'description'), $rules);

        if ($response === true) {

            if ($this->adminPass() === true) {
                try {
                    $updateProduct = DB::table('products')
                        ->where('id', $request->product_id)
                        ->update([
                            'category_id' => $request->cat_id,
                            '_sub_category_id' => $request->sub_cat_id,
                            'name' => $request->product_name,
                            'price' => $request->price,
                            'special_price' => $request->special_price,
                            'stock' => $request->stock,
                            'unit' => $request->unit,
                            'description' => $request->description,
                            'active' => $request->active
                        ]);
                    $imageIds = DB::table('product_imgs')
                        ->where('product_id', $request->product_id)
                        ->pluck('id');
                    $info = [];
                    if ($request->hasFile('productImage')) {

                        $files = $request->file('productImage');
                        foreach ($files as $index => $file) {
                            $ext = $file->getClientOriginalExtension(); //Display File Extension
                            $name = Str::random(14) . Str::limit($file->getClientOriginalName(), 1, '');  // File new Name
                            $file_name = $name . "." . $ext;  // Modified File Name
                            $success = $file->move(public_path('uploads/images/products/'), $file_name); //Move Uploaded File(Upload_dir, File_name)

                            $fileData[] = $file_name; // Files name array

                            $img_data = [
                                'img_name' => $fileData[$index],
                            ];

                            if ($success) {
                                DB::table('product_imgs')->where('id', $imageIds[$index])->update($img_data);
                                $info = count($fileData) . ' product Image updated.';
                            }
                        }

                    }

                    return $this->responseWithSuccess('Product updated Successfully.');

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


    //Delete Product
    public function deleteProduct(Request $request)
    {


        if ($this->adminPass() === true) {
            try {
                $productImages = DB::table('product_imgs')->where('product_id', $request->product_id)->pluck('img_name');
                //print_r($productImages);
                $productDelete = DB::table('products')->whereId($request->product_id)->delete();

                foreach ($productImages as $deleteImage) {
                    $productPhoto = (public_path('uploads/images/products/') . $deleteImage);
                    if (file_exists($productPhoto)) {
                        unlink('uploads/images/products/' . $deleteImage);
                    }
                }
                if ($productDelete) {
                    return $this->responseWithSuccess('Product deleted Successfully.');
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
