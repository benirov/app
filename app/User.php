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
        'fkIdMaster',
        'fkIdDetailMaster'
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

    //  public static function getUserMenu()
    // {
    //      $userMenu = DB::table('tblUserMenu')->whereIn('id', function($query)
    //         {
    //             $query->select(DB::raw('fkIdMenu'))->from('tblProfileUser')->whereRaw('tblProfileUser.fkIdMd', '=', Session::get("Master"));
    //         })->get();

    //      return $userMenu; 
    // }


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
