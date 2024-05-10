<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campagneModel extends Model
{

    protected $table  = 'recru_campagne' ;
    protected $fillable = [
        'nom','objet','lien','date_debut','date_fin'

    ];
}
