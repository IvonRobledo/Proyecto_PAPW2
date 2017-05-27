<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use Redirect;
use Auth;

class controladorLogin extends Controller
{
    public function store(Request $request){
        if(Auth::attempt(['email'=>$request['usuario'], 'password'=>$request['contrasena']]))
        {
            return Redirect::to('/Inicio');
        }
        else
        {
            return Redirect::to('/Login');
        }
    }
    protected function logout(Request $request)
    {
        Auth::logout();

        return Redirect::to('/');
    }
}
