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

namespace App\Http\Resources;


use App\Entities\Admin;

class AdminResource extends Resource
{
    public function __construct($resource, $withToken = false)
    {
        parent::__construct($resource);
        $this->withToken = $withToken;
    }

    /**
     * @param Admin $resource
     * @return array
     */
    public function toResource($resource)
    {
        $data = $resource->toArray();

        return $data;
    }
}
