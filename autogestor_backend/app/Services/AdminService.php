<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:04
 */

namespace App\Services;

use App\Entities\Admin;
use App\Exceptions\ExceptionWithData;
use App\Validators\AdminRules;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class AdminService
 * @package App\Services
 */
class AdminService extends Service
{
    public $relations;

    public $relationsCount;

    /**
     * AdminService constructor.
     */
    public function __construct()
    {
        $this->relations = [];
        $this->relationsCount = [];
    }


    /**
     * Listagem de Admin
     * @param Collection $filters
     * @return Admin[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws Exception
     */
    public function index(Collection $filters = null)
    {
        if (!$filters) {
            $filters = collect();
        }

        $query = Admin::with($this->relations);

        $order = $filters->get('desc', false) ? 'desc' : 'asc';

        $sortBy = $filters->get('sort', 'id');

        $limit = $filters->get('limit', 15);

        $query->orderBy($sortBy, $order);

        return $limit > 0 ? $query->paginate($limit) : $query->get();
    }

    /**
     * Visualizar Admin pelo id
     * @param int|Admin $model
     * @return Admin
     * @throws ModelNotFoundException
     */
    public function show($model): Admin
    {
        if (!$model instanceof Admin) {
            $model = Admin::whereId($model)->firstOrFail();
        }

        return $model->load($this->relations);
    }

    /**
     * Criar Admin
     * @param Collection $data
     * @return Admin
     * @throws Exception
     */
    public function store(Collection $data): Admin
    {
        $this->validateWithArray($data->toArray(), AdminRules::store());

        $model = Admin::create($data->all());

        return $this->show($model);
    }


    /**
     * Atualizar Admin
     * @param Collection $data
     * @param int|Admin $id
     * @throws ModelNotFoundException
     * @throws Exception
     * @return Admin
     */
    public function update(Collection $data, $id): Admin
    {
        $this->validateWithArray($data->toArray(), AdminRules::update());

        $model = $this->show($id);

        $model->update($data->all());

        return $this->show($model);
    }

    /**
     * Deletar Admin
     * @param int|Admin $id
     * @return Admin
     * @throws ModelNotFoundException
     * @throws Exception
     */
    public function delete($id): Admin
    {
        $model = $this->show($id);

        $model->delete();

        return $model;
    }

    /**
     * @param Collection $data
     * @return Admin
     * @throws Exception
     * @throws \Throwable
     */
    public function login(Collection $data): Admin
    {
        $this->validateWithArray($data, AdminRules::login());
        $model = Admin::whereEmail($data->get('email'))->first();

       if(!$model->checkSenha($data->get('senha'))){
            throw new ExceptionWithData('Dados Inválidos', Response::HTTP_BAD_REQUEST, ['senha' => ['senha inválida']]);
        }

        return $model;
    }
}
