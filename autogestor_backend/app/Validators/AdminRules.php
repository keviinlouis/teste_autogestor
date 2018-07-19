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

namespace App\Validators;

use App\Entities\Admin;
use Illuminate\Validation\Rule;


/**
 * Class AdminRules
 * @package App\Validators
 */
class AdminRules
{
    /**
     * @return array
     */
    static public function login(): array
    {
        return [

            'email' => 'required|string|exists:' . (new Admin)->getTable(),
            'senha' => 'required|string',
        ];
    }

    /**
     * Regras para criação de Admin
     * @return array
     */
    static public function store(): array
    {
        return [
            //TODO Implementar store
        ];
    }

    /**
     * Regras para alteração de Admin
     * @return array
     */
    static public function update(): array
    {
        return [
            //TODO Implementar update
        ];
    }
}
