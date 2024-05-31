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


    public function formateur()
    {
        return $this->belongsTo(Formateur::class ,'formateur_id');
    }


 
}
