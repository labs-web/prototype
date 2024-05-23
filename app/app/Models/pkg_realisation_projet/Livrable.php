<?php

namespace App\Models\pkg_realisation_projet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_realisation_projet\NatureLivrable;

class Livrable extends Model
{
    use HasFactory;

    protected $table = 'livrables';

    protected $fillable = ['titre', 'lien', 'description', 'nature_livrable_id'];

    public function natureLivrable()
    {
        return $this->belongsTo(NatureLivrable::class, 'nature_livrable_id');
    }
}
     