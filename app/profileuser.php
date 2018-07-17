<?php

namespace App;
use App\masterdetail
use App\usermenu

use Illuminate\Database\Eloquent\Model;

class profileuser extends Model
{
    protected $table = 'tblProfileUser';

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

}
