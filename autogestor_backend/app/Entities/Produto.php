<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Jul 2018 23:02:48 -0300.
 */

namespace App\Entities;

use App\Entities\Entity as Eloquent;

/**
 * Class Produto
 *
 * @property int $id
 * @property string $nome
 * @property float $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $marca_id
 * @property int $categoria_id
 * @property Categoria $categoria
 * @property Marca $marca
 * @package App\Entities
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Produto onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereMarcaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Produto whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Produto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Produto withoutTrashed()
 * @mixin \Eloquent
 */
class Produto extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public static $snakeAttributes = false;

	protected $casts = [
		'valor' => 'float',
		'marca_id' => 'int',
		'categoria_id' => 'int'
	];

	protected $fillable = [
		'nome',
		'valor',
		'marca_id',
		'categoria_id'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class);
	}

	public function marca()
	{
		return $this->belongsTo(Marca::class);
	}
}
