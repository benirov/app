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
        return view('/login');
    }

    public function getViewRegistration()
    {
        Cookie::forget('XSRF-TOKEN');
        Cookie::forget('laravel_session');

        $User = new User\UserController;
        $TypeUser =  $User->getUserMenu();

        return view('/registration')->with('typeUser', $menu);
    }

    public function getViewLogin()
    {
        return view('/login');
    }

    public function getHome(){
        $menu = new User\UserController;
        $menus =  $menu->getUserMenu();
      return view('/home')->with('menu', $menus);
    }
}
