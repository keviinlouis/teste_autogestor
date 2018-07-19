<?php
/**
 * Criado através de FileTemplate por Kevin.
 */

/**
 * Created by PhpStorm.
 * User: Louis
 * Date: 18/07/2018
 * Time: 23:31
 */

namespace App\Http\Resources;


use App\Entities\Marca;

class MarcaResource extends Resource
{
    /**
     * @param Marca $resource
     * @return array
     */
    public function toResource($resource)
    {
        $data = $resource->toArray();

        return $data;
    }
}
