<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Login;
// use Session;

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
        'username' => 'required|min:6',
        'password' => 'required|min:6',
      ];

      $validation = Validator::make($request->all(), $rules);
      if($validation->fails())
      {
        return redirect('/login')
      ->withErrors( $validation->errors())
      ->withInput(); 
      }

      $fields = $request->all();
      $fields['password'] =  User::generatePassword($fields['password']);
      $login = DB::select('call sp_getUser(?, ?)', array($fields['username'], $fields["password"]));
      if($login[0]->Error == 0){
        $request->session()->put('Company', $login[0]->company);
        $request->session()->put('nameCompany', $login[0]->nameCompany);
        $request->session()->put('urlCompany', $login[0]->urlCompany);
        $request->session()->put('phoneCompany', $login[0]->phoneCompany);
        $request->session()->put('contactCompany', $login[0]->contactCompany);
        $request->session()->put('emailCompany', $login[0]->emailCompany);
        $request->session()->put('Client', $login[0]->Client);
        $request->session()->put('documentClient', $login[0]->documentClient);
        $request->session()->put('nameClient', $login[0]->nameClient);
        $request->session()->put('lastNameClient', $login[0]->lastnameClient);
        $request->session()->put('emailClient', $login[0]->emailClient);
        $request->session()->put('phone', $login[0]->phoneClient);
        $request->session()->put('sex', $login[0]->sexClient);
        $request->session()->put('City', $login[0]->cityClient);
        $request->session()->put('TipoDoc', $login[0]->TipoDocClient);
        $request->session()->put('TypeClient', $login[0]->TypeClientClient);
        $request->session()->put('user', $login[0]->user);
        $request->session()->put('username', $login[0]->username);
        $request->session()->put('profileUser', $login[0]->profileUser);
        // session(['sessionActive' => true]);

        // // Session::set('sessionActive', true);
        
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
    // public function __construct()
    // {
      // $this->redirect();
         // $this->middleware('auth');

        // $this->middleware('guest', ['except' => 'logout']);
    // }
}
