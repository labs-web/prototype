<?php

namespace App\Models\pkg_autorisations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_autorisations\Controller;
use App\Models\pkg_autorisations\Permission;

class Action extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'nom' ,
        'controller_id',
        // 'permission_id',
        'parent_action_id',
        'created_at',
        'updated_at',
        
    ];
    public function controller()
    {
      return $this->belongsTo(Controller::class, 'controller_id');
    }
      public function permissions(){
     return $this->hasOne(Permission::class, 'permission_id');
    }
    // Define the self-referential relationship for nested permissions
    public function parentActions()
    {
      // Laravel convention: model name + _id (singular) for foreign key
      return $this->hasMany(self::class, 'parent_action_id');
    }
    public function childActions()
    {
      // Laravel convention: model name + _id (plural) for foreign key
      return $this->belongsTo(self::class, 'parent_action_id');
    }
    public function autorisations()
    {
        return $this->hasMany(Autorisation::class, 'action_id');
    }

}
