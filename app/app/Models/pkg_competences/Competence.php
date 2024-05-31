<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];


    public function Technologie()
    {
        return $this->hasMany(Technologie::class);
    }
    public function niveau()
    {
        return $this->belongsToMany(NiveauCompetence::class, 'competences_niveau', 'competence_id', 'niveau_competence_id');
    }
}
