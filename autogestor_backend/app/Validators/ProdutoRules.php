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

namespace App\Validators;

use App\Entities\Produto;
use Illuminate\Validation\Rule;


/**
 * Class ProdutoRules
 * @package App\Validators
 */
class ProdutoRules
{

    /**
     * Regras para criação de Produto
     * @return array
     */
    static public function store(): array
    {
        return [
            //TODO Implementar store
        ];
    }

    /**
     * Regras para alteração de Produto
     * @return array
     */
    static public function update(): array
    {
        return [
            //TODO Implementar update
        ];
    }
}
