<?php




namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauCompetence extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'competence_id',
    ];
    public function Competence()
    {
        return $this->belongsTo(Competence::class, 'competence_id');
    }
}
