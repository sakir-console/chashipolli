<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddressController extends Controller
{

    //View my Address book
    public function myAddressBook()
    {
        $user = Auth::user();

        try {
            $view = DB::table('address_books')->where('user_id', $user->id)->get()->first();

            $data['info'] = $view;

            $data['phone'] = $user->phone;
            return $this->responseWithSuccess('Successfully AddressBook fetched.', $data);

        } catch (\Exception $exception) {

            return $this->responseWithError($exception->getMessage());

        }
    }

    //Update  my Address book
    public function updateMyAddressBook(Request $request)
    {

        $data = $request->all();
        $rules = [
            'full_name' => 'string|required|max:100',
            'email' => 'email|required',
            'full_address' => 'string|max:400|required',
        ];

        $response = $this->validateWithJSON($request->only('full_name', 'email', 'full_address'), $rules);

        if ($response === true) {


            try {
                $user = Auth::user();

                $updateProduct = DB::table('address_books')
                    ->where('user_id', $user->id)
                    ->update([
                        'full_name' => $request->full_name,
                        'email' => $request->email,
                        'full_address' => $request->full_address
                    ]);

                return $this->responseWithSuccess('Address updated Successfully.');

            } catch (\Exception $exception) {

                return $this->responseWithError($exception->getMessage());

            }

        } else {

            return $this->responseWithError('Validation failed', $response);
        }

    }


}
