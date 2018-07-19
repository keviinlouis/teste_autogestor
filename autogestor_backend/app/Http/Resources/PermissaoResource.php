<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:29
 */

namespace App\Http\Resources;


use App\Entities\Permissao;

class PermissaoResource extends Resource
{
    /**
     * @param Permissao $resource
     * @return array
     */
    public function toResource($resource)
    {
        $data = $resource->toArray();

        return $data;
    }
}
