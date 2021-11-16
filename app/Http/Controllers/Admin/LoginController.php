<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{

    public function login(Request $request){

        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Check email
        $admin = Admin::where('email', $fields['email'])->first();

        if(!$admin || !Hash::check($fields['password'], $admin->password)){

            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);

        }

        $success['token'] = $admin->createToken('MyAuthApp')->plainTextToken;
        $success['name'] = $admin->name;

        return $this->sendResponse($success, 'User signed in');

    }//end function login

    public function signup(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string|min:6',
            'email' => 'required|string|unique:App\Models\Admin,email',
            'date_of_birth' => 'required|date',
            'sex' => 'required',
            'national_status' => 'required',
            'national_id' => 'required|integer|unique:App\Models\Admin,national_id|min:8',
            'admin_role' => 'required|integer',
            'password' => 'required|min:6|max:10'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $admin = Admin::create($input);

        $success['name'] = $admin->name;

        return $this->sendResponse($success, 'User created successfully.');

    }//end function signup

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        $success = [];

        return $this->sendResponse($success, 'User logged out.');        
    }
}
