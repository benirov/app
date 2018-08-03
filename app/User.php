<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\master;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'tblUsers';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'email',
        'username',
        'lastname',
        'age',
        'tokenUser',
        'fkIdMaster',
        'fkIdDetailMaster',
        'fkIdClient',
        'fechapassw',
        'fechaultlogin',
        'fkIdProfile',
        
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
