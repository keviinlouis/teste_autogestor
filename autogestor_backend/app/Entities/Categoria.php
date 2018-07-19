<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Jul 2018 23:02:48 -0300.
 */

namespace App\Entities;

use App\Entities\Entity as Eloquent;

/**
 * Class Categoria
 *
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property \Illuminate\Database\Eloquent\Collection $produtos
 * @package App\Entities
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Categoria onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Categoria whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Categoria whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Categoria whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Categoria withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Categoria withoutTrashed()
 * @mixin \Eloquent
 */
class Categoria extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public static $snakeAttributes = false;

	protected $fillable = [
		'nome'
	];

	public function produtos()
	{
		return $this->hasMany(Produto::class);
	}
}
