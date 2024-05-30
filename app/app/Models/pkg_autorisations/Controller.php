<?php

namespace App\Models\pkg_autorisations;

use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_autorisations\Action;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Controller extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function actions(){
        return $this->hasMany(Action::class,'controller_id');
    }
}
