<?php

namespace App\Models\pkg_rh;
use App\Models\pkg_projets ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function apprenants()
    {
        return $this->hasMany(Apprenant::class);
    }

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function formateurs()
    {
        return $this->hasMany(Formateur::class);
    }
}
