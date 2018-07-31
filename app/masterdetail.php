<?php

namespace App;
use App\master;

use Illuminate\Database\Eloquent\Model;

class masterdetail extends Model
{
    protected $table = 'tblMastersDetail';

    protected $fillable =
    [
        'name',
        'fkIdMaster'
    ];

    public function master()
    {
      return $this->belongsTo(master::class);
    }
}
