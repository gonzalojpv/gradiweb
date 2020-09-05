<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class UserController extends BaseController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if ( is_null($user) ) {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = Auth::user();

        if ( isset( $input['partial'] ) ) {
            $rules = $this->_rules();

            $validator = Validator::make($input, $rules);

            if( $validator->fails() ) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user->password = Hash::make( $input['password'] );
        }
        else {
            $validator = Validator::make($input, [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
            ]);

            if( $validator->fails() ) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];
            $user->phone_number = $input['phone_number'];
        }

        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }

    private function _rules() {

        $hashed_password = null;
        $user = Auth::user();

        if ($user) {
            $hashed_password = $user->password;
        }

        $rules = [
            'password' => ['string', 'min:6', 'confirmed'],
            'oldPassword'=> "password_hash_check:$hashed_password|string|min:6",
            'newPassword' => 'required_with:oldPassword|confirmed|min:6',
        ];

        return $rules;
    }
}
