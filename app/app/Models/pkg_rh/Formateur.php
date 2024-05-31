<?php

namespace App\Models\pkg_rh;
use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MorphType; 

class Formateur extends Personne
{
    use HasFactory, MorphType; 
    protected $fillable = ['nom', 'prenom', 'user_id', 'groupe_id'];

    public function groupe()
    {
        return $this->hasOne(Groupe::class);
    }
}
