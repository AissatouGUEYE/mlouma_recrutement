<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{
    // use HasFactory;
    protected $table  = 'recru_uProfil' ;
    protected $fillable = [
        'id_user','id_role'

    ];
}
