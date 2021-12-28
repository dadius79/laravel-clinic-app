<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
            Log::info('User Login Failed');

        }

        /** 
         * OLD CODE
         * $loginToken = $admin->createToken('MyAuthApp')->plainTextToken;
         * $success['token'] = $admin->createToken('MyAuthApp')->plainTextToken;
         * $success['access_token'] = $admin->createToken('MyAuthApp')->plainTextToken;
        */

        $loginToken = $admin->createToken('MyAuthApp');

        [$id, $token] = explode('|', $loginToken->plainTextToken, 2);
        
        $success['token'] = $token;
        $success['_id'] = $admin->id;
        $success['name'] = $admin->name;

        return $this->sendResponse($success, 'User signed in');
        Log::info('User Login Successful');

    }//end function login

    public function signup(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string|min:6',
            'email' => 'required|string|unique:App\Models\Admin,email',
            'date_of_birth' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'national_status' => 'required|in:Citizen,Foreigner',
            'national_id' => 'required|integer|unique:App\Models\Admin,national_id|min:8',
            'address' => 'required|string',
            'phone_number' => 'required|min:10|max:10|unique:App\Models\Admin,phone_number',
            'emergency_number' => 'integer',
            'profession_id' => 'string|unique:App\Models\Admin,profession_id',
            'profession_certificate_number' => 'string|unique:App\Models\Admin, profession_certificate_number',
            'admin_role' => 'required|integer',
            'active' => 'required|boolean',
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

    public function userProfile($id){

        $profiles = Admin::all();
        //$profile = Admin::where('id', $id)->get();
        $profile = $profiles->find($id);

        if(!$profile){
            $success = [];
            return $this->sendResponse($success, 'User Profile Could Not Be Found');
            $this->command->info('User profile could not be found');
        }

        $success['_id'] = $profile->id;
        $success['name'] = $profile->name;
        $success['email'] = $profile->email;

        //$this->command->info('User profile extracted successfully');

        return $this->sendResponse($success, 'User Profile Successfully');
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        $success = [];

        return $this->sendResponse($success, 'User logged out.');        
    }
}
