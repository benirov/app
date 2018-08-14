<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;

class master extends Model
{
  use  SoftDeletes;

    protected $table = 'tblMasters';
    protected $dates = ['deleted_at'];
     protected $fillable =
     [
       'typeUser',
       'permittingUser',
       'name'
     ];

     public function getMasterDetail(){
     	 return $this->hasMany('App\masterdetail', 'fkIdMaster', 'id');
     }


     public static function getDataMaster()
     {
        $master = DB::table('tblMasters')->select('id', 'name', 'status')->get();
     }
}
