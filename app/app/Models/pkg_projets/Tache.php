<?php

namespace App\Models\pkg_projets;

use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'dateEchéance',
        'priorité',
        'personne_id',
        'projets_id',
        'status_tache_id',
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
