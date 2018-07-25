<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Login;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    // public function showLoginForm()
    // {
    //     return view('adminlte::auth.login');
    // }

    public function getUser(Request $request){


      $rules =
      [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ];

      $validation = Validator::make($request->all(), $rules);
      if($validation->fails())
      {
        return redirect('/login')
      ->withErrors( $validation->errors() )
      ->withInput(); 
      }

      $fields = $request->all();
      // $fields['password'] =  bcrypt($request->password);
      $login = DB::select('call sp_getUser(?, ?)', array($fields['email'], $fields["password"]));
      // return $login;
      if($login[0]->Error == 0){
        $request->session()->put('User', $login[0]->idUser);
        $request->session()->put('Master', $login[0]->IdMaster);
        $request->session()->put('nameUser', $login[0]->nameUser);
        $request->session()->put('emailUser', $login[0]->email);
        $request->session()->put('sessionActive', true);
         return redirect()->action('HomeController@getHome');
      }
      else
      {
        return redirect('/login')
      ->withErrors( $validation->errors()->add('bd', $login[0]->message))
      ->withInput(); 
      }

    }

    public function redirect()
    {
      if(Session::get('sessionActive'))
      {
        return redirect()->action('HomeController@getHome');
      }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->redirect();
         // $this->middleware('auth');

        // $this->middleware('guest', ['except' => 'logout']);
    }
}
