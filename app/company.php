<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class company extends Model
{

   use  SoftDeletes;
  protected $table = 'tblCompanies';
  protected $dates = ['deleted_at'];
  public $timestamps = false;

  protected $fillable = [
      'namecompany',
      'url',
      'phonecompany',
      'contact',
      'emailcompany',
      'status'
  ];


  public function getClient(){
       return $this->hasOne('App\client', 'fkIdCompanies ', 'id');
     }

  // public function User(){
  //   return $this->belongsTo(User::class);
  // }
    //
}
