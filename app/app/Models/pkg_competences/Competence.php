<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'niveau_competences_id',
    ];

    public function NiveauCompetence()
    {
        return $this->belongsTo(NiveauCompetence::class);
    }

    public function Technologie()
    {
        return $this->hasMany(Technologie::class);
    }
}
