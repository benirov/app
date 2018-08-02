<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Cookie;
// use Illuminate\Support\Facades\A;
use Session;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        config(['app.pagetitle' => 'Inicia sesion para tener el control de tus datos']);
        return view('/login');
    }

    public function getViewRegistration()
    {
        Cookie::forget('XSRF-TOKEN');
        Cookie::forget('laravel_session');

        $User = new User\UserController;
        $TypeUser =  $User->getTypeUsers();
        config(['app.pagetitle' => 'Registrate en la plataforma para que puedas disfrutar de sus beneficios']);

        return view('/registration')->with('typeUser', $TypeUser);
    }

    public function getViewLogin()
    {
        config(['app.pagetitle' => 'Inicia sesion para tener el control de tus datos']);
        return view('/login');
    }

    public function getHome(){
        $menu = new User\UserController;
        $menus =  $menu->getMenu();
        config(['app.pagetitle' => 'Aqui podras visualizar']);
      return view('/home')->with('menu', $menus);
    }
}
