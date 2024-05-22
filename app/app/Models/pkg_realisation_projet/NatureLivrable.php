<?php

namespace App\Models\pkg_realisation_projet;

use App\Models\Livrable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureLivrable extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function Livrable()
    {
        return $this->hasMany(Livrable::class);
    }

}


