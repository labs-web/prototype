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
    ];

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competences_niveau', 'niveau_competence_id', 'competence_id');
    }

}
