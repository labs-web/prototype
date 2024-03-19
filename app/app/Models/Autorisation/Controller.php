<?php

namespace App\Models\Autorisation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];
}
