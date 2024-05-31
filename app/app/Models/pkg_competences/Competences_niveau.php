<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competences_niveau extends Model
{
    use HasFactory;

    protected $table = 'competences_niveau';
    protected $fillable = ['competence_id','niveau_id'];

}