<?php

namespace App\Models\projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\taches\Tache;

class projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom' ,
        'description',
    ];
    public function Tache(){
        return $this->hasMany(Tache::class);
    }
}
