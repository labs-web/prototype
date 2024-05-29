<?php
namespace App\Repositories\pkg_autorisations;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Route;
use App\Exceptions\pkg_autorisations\ControllerExceptions;
use App\Models\pkg_autorisations\Controller;

class GestionControllersRepository extends BaseRepository
{
    protected $model;

    /**
     * Les champs de recherche disponibles pour les projets.
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

    public function __construct()
    {
       parent::__construct(new Controller());
    }

    // public function getModel(): AutorisationController
    // {
    //     return $this->model;
    // }

    public function create(array $data)
    {
        $nom = $data['nom'];

        // Check if the controller name exists in the extracted controller names
        if (!in_array($nom, self::extractControllerNames())) {
            throw ControllerExceptions::ControllerNotExist();
        }

        // Check if the controller already exists in the database
        $existingController = $this->model->where('nom', $nom)->first();
        if ($existingController) {
            throw ControllerExceptions::ControllerAlreadyExist();
        }

        // Create the controller entry using the parent repository method
        return parent::create($data);
    }

    public function update($id, array $data)
    {
        $nom = $data['nom'];

        if (!in_array($nom, $this->extractControllerNames())) {
            throw ControllerExceptions::ControllerNotExist();
        }

        $existingController = $this->model->where('nom', $nom)->where('id', '!=', $id)->first();
        if ($existingController) {
            throw ControllerExceptions::ControllerAlreadyExist();
        }

        return parent::update($id, $data);
    }

    public static function extractControllerNames(): array
    {
        $controllerNames = [];

        // Loop through all routes
        foreach (Route::getRoutes() as $route) {
            $action = $route->getAction();

            // Check if the route has a 'controller' key in its action
            if (isset($action['controller'])) {
                $fullControllerName = $action['controller'];

                // Check if the controller is in the correct namespace and does not belong to Auth namespace
                if (strpos($fullControllerName, 'App\Http\Controllers\\') === 0 && strpos($fullControllerName, 'App\Http\Controllers\Auth\\') === false) {
                    // Extract the controller class name without the namespace and method
                    $controllerNameWithNamespace = str_replace('App\Http\Controllers\\', '', $fullControllerName);
                    $controllerClassName = explode('@', last(explode('\\', $controllerNameWithNamespace)))[0];

                    $controllerNames[] = $controllerClassName;
                }
            }
        }

        // Remove duplicate controller names and return the list
        return array_unique($controllerNames);
    }

    /**
     * Recherche les projets correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 10)
    {
        return $this->model->where('nom', 'like', '%' . $searchableData . '%')->paginate($perPage);
    }
}
