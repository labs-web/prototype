<?php

namespace App\Models\pkg_realisation_projet;

use App\Models\pkg_realisation_projet\Livrable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureLivrable extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];
    public function livrables()
    {
        return $this->hasMany(Livrable::class, 'nature_livrable_id');
    }

}
