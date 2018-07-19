<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Jul 2018 23:02:47 -0300.
 */

namespace App\Entities;

use App\Entities\User as Eloquent;

/**
 * Class Admin
 *
 * @property int $id
 * @property string $email
 * @property string $senha
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @package App\Entities
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Admin onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Admin whereSenha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Admin withoutTrashed()
 * @mixin \Eloquent
 */
class Admin extends Eloquent
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

    function getClassAuth(): string
    {
        return self::class;
    }
}
