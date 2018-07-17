<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
  protected $table = 'tblSesion';

    protected $fillable =
    [
       'name',
       'password',
       'fkIdUser'
    ];

    public function User(){
      return $this->belongsTo(User::class);
    }

}
