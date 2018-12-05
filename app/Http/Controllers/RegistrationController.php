<?php

namespace App\Http\Controllers;

use App\Generator\UsernameGenerator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{

    public function register(Request $request){

        $rules = [
            'email'    => 'required|unique:users',
            'password' => 'required',
        ];
        try {
            $this->validate($request, $rules);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        $generator = UsernameGenerator::get();
        $username  = $generator->generate($request->all());

        $request->request->add(['username' => $username]);

        $data             = $request->all();
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}
