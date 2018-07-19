<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:32
 */

namespace App\Services;

use App\Entities\Marca;
use App\Validators\MarcaRules;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class MarcaService
 * @package App\Services
 */
class MarcaService extends Service
{
    public $relations;

    public $relationsCount;

    /**
     * MarcaService constructor.
     */
    public function __construct()
    {
        $this->relations = [];
        $this->relationsCount = [];
    }


    /**
     * Listagem de Marca
     * @param Collection $filters
     * @return Marca[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws Exception
     */
    public function index(Collection $filters = null)
    {
        if (!$filters) {
            $filters = collect();
        }

        $query = Marca::with($this->relations);

        $order = $filters->get('desc', false) ? 'desc' : 'asc';

        $sortBy = $filters->get('sort', 'id');

        $limit = $filters->get('limit', 15);

        $query->orderBy($sortBy, $order);

        return $limit > 0 ? $query->paginate($limit) : $query->get();
    }

    /**
     * Visualizar Marca pelo id
     * @param int|Marca $model
     * @return Marca
     * @throws ModelNotFoundException
     */
    public function show($model): Marca
    {
        if (!$model instanceof Marca) {
            $model = Marca::whereId($model)->firstOrFail();
        }

        return $model->load($this->relations);
    }

    /**
     * Criar Marca
     * @param Collection $data
     * @return Marca
     * @throws Exception
     */
    public function store(Collection $data): Marca
    {
        $this->validateWithArray($data->toArray(), MarcaRules::store());

        $model = Marca::create($data->all());

        return $this->show($model);
    }


    /**
     * Atualizar Marca
     * @param Collection $data
     * @param int|Marca $id
     * @throws ModelNotFoundException
     * @throws Exception
     * @return Marca
     */
    public function update(Collection $data, $id): Marca
    {
        $this->validateWithArray($data->toArray(), MarcaRules::update());

        $model = $this->show($id);

        $model->update($data->all());

        return $this->show($model);
    }

    /**
     * Deletar Marca
     * @param int|Marca $id
     * @return Marca
     * @throws ModelNotFoundException
     * @throws Exception
     */
    public function delete($id): Marca
    {
        $model = $this->show($id);

        $model->delete();

        return $model;
    }
}
