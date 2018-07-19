<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Jul 2018 23:02:48 -0300.
 */

namespace App\Entities;

use App\Entities\User as Eloquent;

/**
 * Class Usuario
 *
 * @property int $id
 * @property string $email
 * @property string $senha
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property \Illuminate\Database\Eloquent\Collection $permissoes
 * @package App\Entities
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Usuario onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Usuario whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Usuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Usuario whereSenha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Usuario withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Usuario withoutTrashed()
 * @mixin \Eloquent
 */
class Usuario extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public static $snakeAttributes = false;

	protected $hidden = [
		'senha'
	];

	protected $fillable = [
		'email',
		'senha'
	];

	public function permissoes()
	{
		return $this->belongsToMany(Permissao::class, 'usuarios_permissoes', 'usuarios_id', 'permissoes_id');
	}

    function getClassAuth(): string
    {
        return self::class;
    }
}
