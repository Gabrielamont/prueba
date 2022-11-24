<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function login(Request $request)
	{
 		$usuario = count(explode('@',$request->correo));

    	if ($usuario == 1) {
    		$email = $request->email.'@gmail.com';
    	}else{
    		$email = $request->email;
    	}

    	$array  = array('email' => $email,'password' => $request->password );


	        if (Auth::attempt($array))
	        {

                if(Auth::user()->rol_id == 1) {
	        		return redirect('/admin');
                } else {
	        		return redirect('/purchases');
                }



	        }else{
	        	return redirect()->route('login')->withErrors('¡Error!, Revise sus credenciales');
	        }

	}

    public function logout()
    {
            /*---- funcion de salir/logout/cerrar sesion --*/
            Auth::logout();
            return view('login');
    }
}
