<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\company;
use App\User;
use App\client;

class CompanyController extends ApiController
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
        $rules =
      [
        // Compañia
        'namecompany' => ['required','min:6', 'unique:tblCompanies,namecompany'],
        'phonecompany' => 'required|min:6',
        'contact' => 'required||min:6|',
        'emailcompany' => ['required','min:6', 'email','unique:tblCompanies,emailcompany'],
        'url' => ['required','min:6', 'unique:tblCompanies,url'],
        
        // Clientes
        'typedoc' => ['required'],
        'document' => ['required','min:6', 'unique:tblClients,document'],
        'nameclient' => 'required|min:6|',
        'lastnameclient' => 'required|min:6|',
        'password' => 'required|min:6|confirmed',
        'sex' => 'required',
        'civilstatus' => 'required',
        'email' => ['required','min:6', 'email','unique:tblClients,email'],
        'phone' => 'required',
        'direction' => 'required',

        // claves foraneas



        
      ];

      $this->validate($request, $rules);
        $fields = $request->all();
        // $fields['password'] =  bcrypt($request->password);
        $fields['tokenUser'] =  User::generateToken();
        $fields['fkIdDetailMaster'] =  $fields['typeUser'];

        // claves foraneas para cliente

        $fields['fkIdMdCivilStatus'] =  $fields['civilstatus'];
        $fields['fkIdMdsex'] =  $fields['sex'];
        $fields['fkIdCity'] =  $fields['city'];
        $fields['fkIdTipoDoc'] =  $fields['typedoc'];
        $fields['fkIdTypeClient'] =  $fields['typeUser'];

        // $Client = Client::class;
        // $Users = User::class;

        return DB::transaction(function() use ($fields)
        {
            $company = Company::create($fields);
            // $lastcompany = $company->id;
            
            $fields['fkIdCompanies'] =  $company->id;

            

            $Client = Client::create($fields);

            $fields['fkIdClient'] =  $Client->id;

            $User = User::create($fields);

            // return response()->json(['data' => $user], 201);
            return $this->showOne($Client, 201);
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
}
