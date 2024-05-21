<?php

namespace App\Models\pkg_competences;

use App\Models\Technologie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieTechnologie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'updated_at',
        'created_at',
    ];

    public function Technologie(){
        $this->belongsTo(Technologie::class);
    }
}
