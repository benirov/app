<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserController;
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
        $this->redirect();
        return view('/login');
    }

    public function getViewRegistration()
    {
        return view('/registration');
    }

    public function getViewLogin()
    {
        $this->redirect();
        return view('/login');
    }

    public function getHome(){
        $menu = new User\UserController;
        $menus =  $menu->getUserMenu();
      return view('/home')->with('menu', $menus);
    }

    public function redirect()
    {
      if(Session::get('sessionActive'))
      {
        return redirect()->action('HomeController@getHome');
      }
    }
}
