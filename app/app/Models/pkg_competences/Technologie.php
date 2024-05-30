<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\CategorieTechnologie;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technologie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'categorie_technologies_id',
        'competence_id',
    ];

    public function categorieTechnologie()
    {
        return $this->belongsTo(CategorieTechnologie::class, 'categorie_technologies_id');
    }
    public function competence()
    {
        return $this->belongsTo(Competence::class, 'competence_id');
    }
}
