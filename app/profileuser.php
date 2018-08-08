<?php

namespace App;
use App\masterdetail
use App\usermenu
use App\User

use Illuminate\Database\Eloquent\Model;

class profileuser extends Model
{
    protected $table = 'tblProfileUsers';

    protected $fillable =
    [
      'fkIdMd',
      'fkIdMenu',
      'fkMdAction' /*acciones ipo CRUD*/
    ];

    public function MasterDetail(){
      return $this->belongsTo(masterdetail::class);
    }

    public function UserMenu(){
      return $this->belongsTo(usermenu::class);
    }

    public function getProfileUser($id)
    {
     return $this->hasMany(User::class); 
    }

}
