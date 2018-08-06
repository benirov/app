<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\User;
use App\Login;
use App\company;
use Illuminate\Support\Facades\Session;
use App\masterdetail;

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
        $user = User::find($id);
        $user -> delete();
        return $this->deletedModel(201); 
    }


     public function getMenu()
    {
         $userMenu = DB::table('tblUsersMenu')->whereIn('id', function($query)
            {
                $query->select(DB::raw('fkIdMenu'))->from('tblProfileUsers')->whereRaw('tblProfileUsers.id = '.Session::get("profileUser").'');
            })->get();
         dd($userMenu);

         return $userMenu; 
    }

    public function getTypeUsers()
    {
            $usersType = DB::table('tblMastersDetail')->where('fkIdMaster', 1)->where('status', 1)->toSql();
        return $usersType;
    }
}
