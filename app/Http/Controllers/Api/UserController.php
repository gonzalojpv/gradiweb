<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\User;
use App\Car;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\CarResource;

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

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'first_name'   => 'required',
            'last_name'    => 'required',
            'phone_number' => 'required',
            'email'        => 'required|email',
            'plate'        => 'required',
            'brand'        => 'required',
            'type'         => 'required',
            'model'        => 'required',
        ]);

        if( $validator->fails() ) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt('test123test');

        try {
            $user = User::create($input);
        }
        catch (QueryException $e){
            $error_code = $e->errorInfo[1];
            if ( $error_code == 1062 ) {
                return $this->sendError('Correo electrónico ya registrado', ['error'=>'Duplicate']);
            }
        }

        try {
            $car = new Car;

            $car->alias = $input['alias'];
            $car->plate = $input['plate'];
            $car->brand = $input['brand'];
            $car->type = $input['type'];
            $car->model = $input['model'];
            $car->user_id = $user->id;

            $car->save();
        }
        catch (QueryException $e){
            $error_code = $e->errorInfo[1];
            return $this->sendError('Error', ['error'=>'Create']);
        }

        return $this->sendResponse(new CarResource($user), 'Car retrieved successfully.');
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
         $validator = Validator::make($input, [
            'first_name'   => 'required',
            'last_name'    => 'required',
            'phone_number' => 'required',
            'email'        => 'required',
        ]);

        if( $validator->fails() ) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->phone_number = $input['phone_number'];

        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }
}
