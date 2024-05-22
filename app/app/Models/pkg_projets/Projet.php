<?php

namespace App\Models\pkg_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'objectifs', 'date_debut', 'date_echeance'];
    public function competences()
    {
        return $this->belongsToMany('App\Model\pkg_competences\Competence');
    }

}
