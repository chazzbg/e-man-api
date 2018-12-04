<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 12/5/18
 * Time: 12:45 AM
 *
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class RegistrationController extends Controller
{

    public function register(Request $request){

        /** @var \Illuminate\Contracts\Validation\Factory $v */
        $v = app('validator');
        try {
            $v->make(['username' => 'sdasd'], [
                'username' => 'required|unique:users'
            ])->validate();
        } catch (ValidationException $e) {
            dd($e->validator->getMessageBag());
        }
    }
}
