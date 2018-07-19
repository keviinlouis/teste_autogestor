<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuariosPermissoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios_permissoes', function(Blueprint $table)
		{
			$table->foreign('permissoes_id', 'fk_usuarios_has_permissoes_permissoes1')->references('id')->on('permissoes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('usuarios_id', 'fk_usuarios_has_permissoes_usuarios')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usuarios_permissoes', function(Blueprint $table)
		{
			$table->dropForeign('fk_usuarios_has_permissoes_permissoes1');
			$table->dropForeign('fk_usuarios_has_permissoes_usuarios');
		});
	}

}
