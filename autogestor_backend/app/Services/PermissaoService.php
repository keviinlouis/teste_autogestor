<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:30
 */

namespace App\Services;

use App\Entities\Permissao;
use App\Validators\PermissaoRules;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class PermissaoService
 * @package App\Services
 */
class PermissaoService extends Service
{
    public $relations;

    public $relationsCount;

    /**
     * PermissaoService constructor.
     */
    public function __construct()
    {
        $this->relations = [];
        $this->relationsCount = [];
    }


    /**
     * Listagem de Permissao
     * @param Collection $filters
     * @return Permissao[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws Exception
     */
    public function index(Collection $filters = null)
    {
        if (!$filters) {
            $filters = collect();
        }

        $query = Permissao::with($this->relations);

        $order = $filters->get('desc', false) ? 'desc' : 'asc';

        $sortBy = $filters->get('sort', 'id');

        $limit = $filters->get('limit', 15);

        $query->orderBy($sortBy, $order);

        return $limit > 0 ? $query->paginate($limit) : $query->get();
    }

    /**
     * Visualizar Permissao pelo id
     * @param int|Permissao $model
     * @return Permissao
     * @throws ModelNotFoundException
     */
    public function show($model): Permissao
    {
        if (!$model instanceof Permissao) {
            $model = Permissao::whereId($model)->firstOrFail();
        }

        return $model->load($this->relations);
    }

    /**
     * Criar Permissao
     * @param Collection $data
     * @return Permissao
     * @throws Exception
     */
    public function store(Collection $data): Permissao
    {
        $this->validateWithArray($data->toArray(), PermissaoRules::store());

        $model = Permissao::create($data->all());

        return $this->show($model);
    }


    /**
     * Atualizar Permissao
     * @param Collection $data
     * @param int|Permissao $id
     * @throws ModelNotFoundException
     * @throws Exception
     * @return Permissao
     */
    public function update(Collection $data, $id): Permissao
    {
        $this->validateWithArray($data->toArray(), PermissaoRules::update());

        $model = $this->show($id);

        $model->update($data->all());

        return $this->show($model);
    }

    /**
     * Deletar Permissao
     * @param int|Permissao $id
     * @return Permissao
     * @throws ModelNotFoundException
     * @throws Exception
     */
    public function delete($id): Permissao
    {
        $model = $this->show($id);

        $model->delete();

        return $model;
    }
}
