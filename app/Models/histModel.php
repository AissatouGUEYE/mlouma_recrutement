<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histModel extends Model
{
    // use HasFactory;
    protected $table = 'recru_hist';
    protected $fillable = [
        'type' , 'utilisateur','module'

    ] ;
}
