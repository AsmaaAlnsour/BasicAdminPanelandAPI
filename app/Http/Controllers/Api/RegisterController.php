<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $input = $request->validated();
         $customer = Customer::create($input);
        $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
        $success['name'] =  $customer->name;

        return $this->sendResponse($success, 'customer register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {


        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){

            $customer = auth()->guard('customer')->user();
            $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
            $success['name'] =  $customer->name;

            return $this->sendResponse($success, 'customer login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}
