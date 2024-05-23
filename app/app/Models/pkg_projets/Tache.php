<?php

namespace App\Models\pkg_projets;

use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $filleable = [
        'projets_id',
        'personne_id',
        'dateEchéance',
        'priorité',
        'date_debut',
        'description',
        'nom',
        'created_at',
        'updated_at'
    ];
    public function Personne(){
        return $this->belongsTo(Personne::class);
    }

    public function Projet(){
        return $this->belongsTo(Projet::class);
    }

    public function StatutTache(){
        return $this->belongsTo(StatutTache::class);
    }
}
