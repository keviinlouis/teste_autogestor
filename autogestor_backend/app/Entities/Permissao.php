<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Jul 2018 23:02:48 -0300.
 */

namespace App\Entities;

use App\Entities\Entity as Eloquent;

/**
 * Class Permissao
 *
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 * @package App\Entities
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Permissao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Permissao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Permissao whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Permissao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permissao extends Eloquent
{
	protected $table = 'permissoes';
	public static $snakeAttributes = false;

	protected $fillable = [
		'nome'
	];

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'usuarios_permissoes', 'permissoes_id', 'usuarios_id');
	}
}
