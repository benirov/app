<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class binnacle extends Model
{

  protected $table = 'tblBinnacles';
  public $timestamps = false;

  protected $fillable = [
      'time',
      'action',
      'fkIdUser'
  ];

  public function User(){
    return $this->belongsTo(User::class);
  }
    //
}
