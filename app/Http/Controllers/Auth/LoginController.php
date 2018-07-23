<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Login;

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

      $this->validate($request, $rules);
      $fields = $request->all();
      // $fields['password'] =  bcrypt($request->password);
      $login = DB::select('call sp_getUser(?, ?)', array($fields['email'], $fields["password"]));
      // return $login;
      if($login){
        $request->session()->put('User',2);
        $request->session()->put('Master',1);
        $request->session()->put('nameUser',1);
        $request->session()->put('emailUser',1);

        echo $login[0]->email;
        // return redirect('/home');
         // return redirect()->action('HomeController@getHome');
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
         // $this->middleware('auth');

        // $this->middleware('guest', ['except' => 'logout']);
    }
}
