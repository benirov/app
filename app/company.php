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
      'name',
      'url',
      'phone',
      'contac',
      'logo',
      'email',
  ];

  // public function User(){
  //   return $this->belongsTo(User::class);
  // }
    //
}
