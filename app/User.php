<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\master;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tblUsers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     const typeUser = '1';

    protected $fillable = [
        'email',
        'name',
        'lastname',
        'age',
        'tokenUser',
        'fkIdMaster'
    ];

    public function User(){
      return $this->belongsTo(master::class);
    }

    public function typeUser(){
      return $this->typeUser == User::typeUser;
    }

    public static function generateToken()
    {
      return str_random(100);
    }

     public static function getUserMenu()
    {
         $userMenu = DB::table('tblUserMenu')->whereIn('id', function($query)
            {
                $query->select(DB::raw('fkIdMenu'))->from('tblProfileUser')->whereRaw('tblProfileUser.fkIdMd = {Session::get("Master")}');
            })->get();

         return $userMenu; 
    }
//     DROP PROCEDURE IF EXISTS sp_insertUser
// DELIMETER ;
//    CREATE PROCEDURE sp_insertUser(
//        in _name VARCHAR(15),
//        in _email VARCHAR(30),
//        in _password VARCHAR(40),
//        in _typeUser int(1),
//        in _tokenUser VARCHAR(190),
//        in _permittingUser int(7),
//        in _url int(7),
//    );
//    BEGIN
// //


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tokenUser'
    ];
}
