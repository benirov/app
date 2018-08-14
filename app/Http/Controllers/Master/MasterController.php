<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\master;
use App\masterDetail;

class MasterController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = master::all();
        // return response()->json(['data' =>$users], 200);
        return $this->showAll($master, 200);
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

          $rules =
            [
            // Compañia
            'name' => ['required','min:6'],  
            ];

      $this->validate($request, $rules);
     $data = $request->all();
     return $data['name'];
     echo $data['name'];   

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
        return $request;
        // return "aqui";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $master = master::findOrFail($id);
        $master->delete();
        return $this->deletedData();
    }

    public function getMasterDetail($id)
    {
        $MasterDetail =  master::find($id);
        return $this->showAll($MasterDetail->getMasterDetail, 200);

    }

    public function updateMaster(Request $request)
    {
        $data = $request->all();  
        $master = $master = master::findOrFail($data['id']);
        $master->name = $data['name'];
        $master->status = $data['status'];
        $master->save();
        return $this->showOne($master, 201);
    }


    public function getMaster()
    {
        $Master =  master::getDataMaster();
        return $this->showAll($Master, 200);

    }
}
