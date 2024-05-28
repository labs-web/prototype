<?php

namespace App\Models\pkg_rh;
use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MorphType; 

class Formateur extends Personne
{
    use HasFactory, MorphType; 
}
