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

namespace App\Validators;

use App\Entities\Usuario;
use Illuminate\Validation\Rule;


/**
 * Class UsuarioRules
 * @package App\Validators
 */
class UsuarioRules
{
    /**
     * @return array
     */
    static public function login(): array
    {
        return [

            'email' => 'required|string|exists:' . (new Usuario)->getTable(),
            'senha' => 'required|string',
        ];
    }

    /**
     * Regras para criação de Usuario
     * @return array
     */
    static public function store(): array
    {
        return [
            'email' => 'required|unique:usuarios|email',
            'senha' => 'required|min:6',
            'permissoes' => 'required|array',
            'permissoes.*' => 'integer|exists:permissoes,id'
        ];
    }

    /**
     * Regras para alteração de Usuario
     * @return array
     */
    static public function update(): array
    {
        return [
            'email' => 'unique:usuarios|email',
            'senha' => 'min:6',
            'permissoes' => 'array',
            'permissoes.*' => 'integer|exists:permissoes,id'
        ];
    }
}
