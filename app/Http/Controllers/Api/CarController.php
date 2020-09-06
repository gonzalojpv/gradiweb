<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CarResource;
use Validator;
use App\Car;

class CarController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cars = $user->cars;
        return $this->sendResponse(CarResource::collection($cars), 'Cars retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plate' => 'required',
            'brand' => 'required',
            'type'  => 'required',
            'model' => 'required',
        ]);

        if( $validator->fails() )
            return $this->sendError('Validation Error.', $validator->errors());

        $input = $request->all();

        try {
            $car = Car::create($input);
        }
        catch (QueryException $e){
            $error_code = $e->errorInfo[1];
            return $this->sendError('Error', ['error'=>'Create']);
        }

        return $this->sendResponse(new CarResource($user), 'Car retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        $user = Auth::user();
        $cars = $user->cars;
        return $this->sendResponse(CarResource::collection($cars), 'User cars deleted successfully.');
    }
}
