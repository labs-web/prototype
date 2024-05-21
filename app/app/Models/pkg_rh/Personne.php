<?php

namespace App\Models\pkg_rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    public $table = 'personnes';
    protected $fillable = ['nom','prenom'];
}
