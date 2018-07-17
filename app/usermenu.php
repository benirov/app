<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usermenu extends Model
{
    protected $table = 'tblUserMenu';

    protected $fillable =
    [
      'name',
      'route',
      'parent',
      'order',
      'enabled',
    ];
}
