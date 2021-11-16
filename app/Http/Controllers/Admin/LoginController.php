<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $fields = $request->validate([
            
        ]);
    }
}
