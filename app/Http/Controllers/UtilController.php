<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UtilController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function getDataSex()
    {
        $datasex = DB::table('tblMastersDetail')->where('fkIdMaster', 4)->where('status', 1)->get();


        return $this->successResponse($datasex, 200);

    }

    public function getDataCivilStatus()
    {
        $datacivilstatus = DB::table('tblMastersDetail')->where('fkIdMaster', 5)->where('status', 1)->get();


        return $this->successResponse($datacivilstatus, 200);        
    }

    public function getDataTipoDoc()
    {
        $dataTipoDoc = DB::table('tblMastersDetail')->where('fkIdMaster', 3)->where('status', 1)->get();


        return $this->successResponse($dataTipoDoc, 200);       
    }

    public function getDataCity()
    {
        $dataCity = DB::table('tblCities')->where('status', 1)->get();


        return $this->successResponse($dataCity, 200);       
    }


}
