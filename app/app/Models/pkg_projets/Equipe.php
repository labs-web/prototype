<?php

namespace App\Models\pkg_projets;

use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_projets\Projet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;
    protected $fillable = ['nom','description','projet_id'];

    public function projets()
    {
        return $this->belongsTo(Projet::class);
    }
    
    public function apprenants()
    {
        return $this->belongsToMany(Apprenant::class);
    }
}
