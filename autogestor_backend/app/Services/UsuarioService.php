<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:07
 */

namespace App\Services;

use App\Entities\Usuario;
use App\Exceptions\ExceptionWithData;
use App\Validators\UsuarioRules;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UsuarioService
 * @package App\Services
 */
class UsuarioService extends Service
{
    public $relations;

    public $relationsCount;

    /**
     * UsuarioService constructor.
     */
    public function __construct()
    {
        $this->relations = [];
        $this->relationsCount = [];
    }


    /**
     * Listagem de Usuario
     * @param Collection $filters
     * @return Usuario[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @throws Exception
     */
    public function index(Collection $filters = null)
    {
        if (!$filters) {
            $filters = collect();
        }

        $query = Usuario::with($this->relations);

        $order = $filters->get('desc', false) ? 'desc' : 'asc';

        $sortBy = $filters->get('sort', 'id');

        $limit = $filters->get('limit', 15);

        $query->orderBy($sortBy, $order);

        return $limit > 0 ? $query->paginate($limit) : $query->get();
    }

    /**
     * Visualizar Usuario pelo id
     * @param int|Usuario $model
     * @return Usuario
     * @throws ModelNotFoundException
     */
    public function show($model): Usuario
    {
        if (!$model instanceof Usuario) {
            $model = Usuario::whereId($model)->firstOrFail();
        }

        return $model->load($this->relations);
    }

    /**
     * Criar Usuario
     * @param Collection $data
     * @return Usuario
     * @throws Exception
     */
    public function store(Collection $data): Usuario
    {
        $this->validateWithArray($data->toArray(), UsuarioRules::store());

        $model = Usuario::create($data->all());

        $model->permissoes()->attach($data->get('permissoes'));

        return $this->show($model);
    }


    /**
     * Atualizar Usuario
     * @param Collection $data
     * @param int|Usuario $id
     * @throws ModelNotFoundException
     * @throws Exception
     * @return Usuario
     */
    public function update(Collection $data, $id): Usuario
    {
        $model = $this->show($id);
        if($model->email == $data->get('email')){
            $data->pull('email');
        }

        if(blank($data->get('senha'))){
            $data->pull('senha');
        }

        $this->validateWithArray($data->toArray(), UsuarioRules::update());


        $model->update($data->all());

        if($permissoesIds = $data->get('permissoes')){
            $model->permissoes()->sync($permissoesIds);
        }

        return $this->show($model);
    }

    /**
     * Deletar Usuario
     * @param int|Usuario $id
     * @return Usuario
     * @throws ModelNotFoundException
     * @throws Exception
     */
    public function delete($id): Usuario
    {
        $model = $this->show($id);

        $model->delete();

        return $model;
    }

    /**
     * @param Collection $data
     * @return Usuario
     * @throws Exception
     * @throws \Throwable
     */
    public function login(Collection $data): Usuario
    {
        $this->validateWithArray($data, UsuarioRules::login());
        $model = Usuario::whereEmail($data->get('email'))->first();

        if(!$model->checkSenha($data->get('senha'))){
            throw new ExceptionWithData('Dados Inválidos', Response::HTTP_BAD_REQUEST, ['senha' => ['senha inválida']]);
        }

        return $model;
    }
}
