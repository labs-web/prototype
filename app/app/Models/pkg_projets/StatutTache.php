<?php

namespace App\Models\pkg_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutTache extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'description',
        'created_at',
        'updated_at',
    ];
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }
}
