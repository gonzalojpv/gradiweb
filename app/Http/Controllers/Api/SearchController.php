<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\User;
use App\Car;
use Validator;

class SearchController extends BaseController
{
    public function index(Request $request) {
        $input = $request->all();

        $validator = Validator::make( $input, [
            'brand' => 'required',
        ]);

        if ($validator->fails())
            return $this->sendError('Validation Error.', $validator->errors());

         $cars = Car::select('cars.*')->where('cars.brand', $input['brand']);

        if ( isset( $input['query'] ) ) {
            $cars = Car::select('cars.*')->orWhere('cars.plate', 'like', '%' . $input['query'] . '%');
            $cars = $cars->rightJoin('users', 'cars.user_id', '=', 'users.id')->orWhere('users.first_name', 'like', '%' . $input['query'] . '%');
        }

        $results = $cars->groupBy('cars.id')->paginate(3);

        return $this->sendResponse(CarResource::collection($results), 'Results retrieved successfully.');
    }
}
