<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidatureModel extends Model
{
  //  use HasFactory;
  protected $table = 'recru_candidature';
  protected $fillable = [
    'id_campagne',
    'nom',
    'prenom',
    'genre',
    'dt_naiss',
    'profil_social',
    'niveau_etu',
    'filiere',
    'eno',
    'cv',
    'lm',
    'pp',
    'langue',
    'tel',
    'email',
    'region',
    'dept',
    'commune',
    'localite',
    'etat',
    'formation',
    'password',
    'actif',
    'pratique',
    'organisation'

  ];
}
