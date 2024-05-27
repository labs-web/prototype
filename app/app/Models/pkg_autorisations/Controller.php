<?php

namespace App\Models\pkg_autorisations;

use App\Models\pkg_autorisations\Action;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
