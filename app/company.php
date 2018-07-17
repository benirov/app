<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
  protected $table = 'tblCompany';
  public $timestamps = false;

  protected $fillable = [
      'name',
      'url',
      'fkIdUser'
  ];

  public function User(){
    return $this->belongsTo(User::class);
  }
    //
}
