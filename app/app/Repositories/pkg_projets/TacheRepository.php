<?php
namespace App\Repositories\pkg_projets;

use App\Models\pkg_projets\Tache;
use App\Repositories\BaseRepository;

/**
 * Classe TacheRepository qui gère la persistance des tasks dans la base de données.
 */
class TacheRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les tasks.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'name'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    /**
     * Constructeur de la classe TaskRepository.
     */
    public function __construct()
    {
        parent::__construct(new Tache());
    }
}
