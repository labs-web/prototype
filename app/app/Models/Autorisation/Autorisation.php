<?php

namespace App\Models\Autorisation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'roles' ,
        'controllers',
        'actions'
    ];


}
