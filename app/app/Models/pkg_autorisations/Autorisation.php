<?php

namespace App\Models\pkg_autorisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'action_id',
        'role_id',
        'created_at',
        'updated_at',
    ]; 

public function action(){
        return $this->belongsTo(Action::class, 'action_id');
}
public function Role(){
    return $this->belongsTo(Role::class, 'role_id');
}
}
