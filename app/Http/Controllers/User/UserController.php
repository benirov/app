<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\User;
use App\Login;
use App\company;
use Illuminate\Support\Facades\Session;

class UserController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // return response()->json(['data' =>$users], 200);
        return $this->showAll($users);
        exit();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // echo $request;
        // exit();
      $rules =
      [
        'email' => 'required|email|unique:tblUsers',
        'name' => 'required',
        'namecompany' => 'required|min:6|unique:tblCompany',
        'url' => 'required|min:6|unique:tblCompany',
        'password' => 'required|min:6|confirmed',
        'typeUser' => 'required',
      ];

      $this->validate($request, $rules);
        $fields = $request->all();
        // $fields['password'] =  bcrypt($request->password);
        $fields['tokenUser'] =  User::generateToken();
        $fields['fkIdMaster'] =  $fields['typeUser'];

        $loginSesion = Login::class;
        $classCompany     = company::class;

        return DB::transaction(function() use ($fields, $loginSesion, $classCompany)
        {
            $user = User::create($fields);
            $lastIdUser = $user->id;
            $dataLogin =
            [
              'name' => $fields['email'],
              'password' => $fields['password'],
              'fkIdUser' => $lastIdUser
            ];

            $dataCompany =
            [
              'name' => $fields['namecompany'],
              'url' => $fields['url'],
              'fkIdUser' => $lastIdUser
            ];

            $login = $loginSesion::create($dataLogin);
            $company = $classCompany::create($dataCompany);

            // return response()->json(['data' => $user], 201);
            return $this->showOne($user, 201);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        // return response()->json(['data' => $user], 200);
        return $this->showOne($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //  public function getUserMenu()
    // {
    //     // echo Session::get("Master");
    //      $userMenu = DB::table('tblUserMenu')->whereIn('id', function($query)
    //         {
    //             $query->select(DB::raw('fkIdMenu'))->from('tblProfileUser')->whereRaw('tblProfileUser.fkIdMd = '.Session::get("Master").'');
    //         })->get();

    //      return $userMenu; 
    // }
}
