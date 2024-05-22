<?php

namespace App\Models\pkg_autorisations;

use App\Models\Action;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    // TODO : relation hasMany non valide, il doit être relié avec action_id
    public function actions(){
        return $this->hasMany(Action::class,'controller_id');
    }
}
