<?php

namespace App\Models\pkg_projets;

use App\Models\pkg_projets\Equipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'objectifs', 'date_debut', 'date_echeance'];
    
    public function competences()
    {
        return $this->belongsToMany('App\Model\pkg_competences\Competence');
    }

    public function Tache(){
        return $this->hasMany(Tache::class);
    }
  
    public function equipe()
    {
        return $this->hasMany(Equipe::class);
    }
}
