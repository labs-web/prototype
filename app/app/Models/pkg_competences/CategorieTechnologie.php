<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieTechnologie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function technologie()
    {
        return $this->hasMany(Technologie::class, 'categorie_technologies_id');
    }
}
