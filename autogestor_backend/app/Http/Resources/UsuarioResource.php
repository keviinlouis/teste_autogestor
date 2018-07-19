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

namespace App\Http\Resources;


use App\Entities\Usuario;

class UsuarioResource extends Resource
{
    public function __construct($resource, $withToken = false)
    {
        parent::__construct($resource);
        $this->withToken = $withToken;
    }

    /**
     * @param Usuario $resource
     * @return array
     */
    public function toResource($resource)
    {
        $data = $resource->toArray();

        $data['permissoes'] = $resource->permissoes->pluck('id');

        return $data;
    }
}
