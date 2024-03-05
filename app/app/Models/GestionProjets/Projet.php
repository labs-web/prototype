<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\taches\Tache;

class projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom' ,
        'description',
        'date_debut',
        'date_de_fin',
        
    ];
    public function Tache(){
        return $this->hasMany(Tache::class);
    }
}
