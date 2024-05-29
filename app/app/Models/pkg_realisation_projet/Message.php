<?php

namespace App\Models\pkg_realisation_projet;


use App\Models\pkg_projets\Projet;
use App\Models\pkg_projets\Tache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'projet_id',
        'tache_id',
        'isLue',
    ];

    public function Projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function Tache()
    {
        return $this->belongsTo(Tache::class);
    }
}
