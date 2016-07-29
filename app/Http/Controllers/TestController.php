<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin()
    {
        $data = [
          'email' => 'robinhodemorais@gmail.com',
            'password'=> 123456
        ];


       /* LOGA O USUÁRIO
       if (Auth::attempt($data)) {
            return "Logou";
        }
       */

       //VERIFICA SE ESTÁ LOGADO
        if (Auth::check()){
            return "Logado";
        }

        return "falhou";
    }

    public function getLogout()
    {
        //DESLOGA
        Auth::logout();

        if (Auth::check()){
            return "logado";
        }

        return "Não está logado";
    }
}
