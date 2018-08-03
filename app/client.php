<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class client extends Model
{
	use  SoftDeletes;

	protected $table = 'tblClients';
    protected $dates = ['deleted_at'];
    

    protected $fillable = [
        'fkIdCompanies',
        'document',
        'name',
        'lastname',
        'birth',
        'fkIdMdCivilStatus',
        'email',
        'phone',
        'cel',
        'direction',
        'children',
        'fkIdMdsex',
        'deleted_at',
        'status',
        'fkIdCity',
        'fkIdTipoDoc',
        'fkIdTypeClient'
    ];
}