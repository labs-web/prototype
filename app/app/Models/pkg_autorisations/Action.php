<?php

namespace App\Models\pkg_autorisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_autorisations\Controller;

class Action extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'nom' ,
        'controller_id',
        'created_at',
        'updated_at',
        
    ];
    public function controller(){
        return $this->belongsTo(Controller::class, 'controller_id');
    }

}
