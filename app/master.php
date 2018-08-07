<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master extends Model
{

    protected $table = 'tblMasters';
     protected $fillable =
     [
       'typeUser',
       'permittingUser',
       'name'
     ];

     public function getMasterDetail(){
     	 return $this->hasMany('App\masterdetail', 'fkIdMaster', 'id');
     }
}
