<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mlusersModel extends Model
{
    // use HasFactory;
    protected $table  = 'ml_users' ;
    protected $fillable = [
        'prenom','nom','tel','genre','mail','id_campagne'

    ];
}
