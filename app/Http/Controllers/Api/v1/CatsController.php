<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatsController extends Controller
{
    //-----------------Category--------------------

    //Add Item category
    public function addCategory(Request $request)
    {


        $rules = [
            'cat_name' => 'string|required|max:100',
            'cat_image.*' => 'mimes:jpeg,jpg,png|max:1048'
        ];

        $response = $this->validateWithJSON($request->only('cat_name'), $rules);
        if ($this->adminPass() === true) {

            if ($response === true) {

                try {
                    $uploadImage = $this->imageUpload($request, 'cat_image', 'CATS');
                    $newCategory = DB::table('categories')->insert([
                        "name" => $request->cat_name,
                        "icon" => $uploadImage
                    ]);
                    if ($newCategory) {
                        return $this->responseWithSuccess('Category Successfully Created');
                    } else {
                        return $this->responseWithError('Could not add Category.', $response);
                    }

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

    // View Category List
    public function categoryList(Request $request)
    {
        try {
            $view = DB::table('categories');
            if ($request->has('cat_id')) {
                $view->where('id', $request->cat_id);
            }

            return $this->responseWithSuccess('Category successfully fetched.', $view->get());

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }


    //Update Item category
    public function updateCategory(Request $request)
    {


        $rules = [
            'cat_name' => 'string|required|max:100'
        ];

        $response = $this->validateWithJSON($request->only('cat_name'), $rules);
        if ($this->adminPass() === true) {

            if ($response === true) {

                try {

                    $newCategory = DB::table('categories')->whereId($request->cat_id)->update([
                        "name" => $request->cat_name,

                    ]);

                    return $this->responseWithSuccess('Category Updated Successfully.');

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


    //Delete Category
    public function deleteCategory(Request $request)
    {


        if ($this->adminPass() === true) {
            try {

                $catDelete = DB::table('categories')->whereId($request->cat_id)->delete();

                if ($catDelete) {
                    return $this->responseWithSuccess('Category deleted Successfully.');
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

//----------------sub Category----------------

    //Add Item sub-category
    public function addSubCategory(Request $request)
    {
        $rules = [
            'subCat_name' => 'string|required|max:100',
            'cat_id' => 'required',
            'scat_image.*' => 'mimes:jpeg,jpg,png|max:1048'
        ];

        $response = $this->validateWithJSON($request->only('subCat_name', 'cat_id'), $rules);
        if ($this->adminPass() === true) {

            if ($response === true) {

                try {
                    $uploadImage = $this->imageUpload($request, 'scat_image', 'CATS');
                    $newSubCategory = DB::table('_sub_categories')->insert([
                        "name" => $request->subCat_name,
                        "category_id" => $request->cat_id,
                        "icon" => $uploadImage
                    ]);

                    if ($newSubCategory) {
                        return $this->responseWithSuccess('Sub-Category Successfully Created');
                    } else {
                        return $this->responseWithError('Could not add Sub-Category.', $response);
                    }


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

    // View Category List
    public function subcategoryList(Request $request)
    {
        try {
            $query = SubCategory::with('category');
            if ($request->has('catId')) {
                $query->where('category_id', $request->catId);
            }
            $view = $query->get()->map(function ($view) {
                return [
                    "id" => $view->id,
                    "cat_id" => $view->category_id,
                    "name" => $view->name,
                    "icon" => $view->icon,
                    "cat_name" => $view->category->name
                ];

            });

            return $this->responseWithSuccess('Sub-Category List successfully fetched.', $view);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }


    }


    //Update Item sub-category
    public function updateSubCategory(Request $request)
    {


        $rules = [
            'subcat_name' => 'string|required|max:100'
        ];

        $response = $this->validateWithJSON($request->only('subcat_name'), $rules);
        if ($this->adminPass() === true) {

            if ($response === true) {

                try {

                    $newCategory = DB::table('_sub_categories')->whereId($request->subcat_id)->update([
                        "name" => $request->subcat_name,
                        "category_id" => $request->cat_id
                    ]);

                    return $this->responseWithSuccess('Sub-Category Updated Successfully.');

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


    //Delete Sub-Category
    public function deleteSubCategory(Request $request)
    {


        if ($this->adminPass() === true) {
            try {

                $subcatDelete = DB::table('_sub_categories')->whereId($request->subcat_id)->delete();

                if ($subcatDelete) {
                    return $this->responseWithSuccess('Sub-Category deleted Successfully.');
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
