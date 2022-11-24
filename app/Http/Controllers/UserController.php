<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerUser(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email'         => 'required|email|unique:users',
            'password'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User;
        $user->fill($request->all());
        $user->rol_id = 2;
        $user->password = bcrypt($request->input('password'));

        if ($user->save()) {
            return redirect("/")->with([
                'flash_message' => 'Usuario registrado correctamente.',
                'flash_class'   => 'alert-success',
            ]);
        } else {
            //si da un error al guardar
            return redirect("/")->with([
                'flash_message'   => 'Ha ocurrido un error.',
                'flash_class'     => 'alert-danger',
                'flash_important' => true,
            ]);
        } //fin if guarda el dato

    }
}
