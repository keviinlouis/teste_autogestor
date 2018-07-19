<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosPermissoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios_permissoes', function(Blueprint $table)
		{
			$table->integer('usuarios_id')->unsigned()->index('fk_usuarios_has_permissoes_usuarios_idx');
			$table->integer('permissoes_id')->unsigned()->index('fk_usuarios_has_permissoes_permissoes1_idx');
			$table->primary(['usuarios_id','permissoes_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios_permissoes');
	}

}
