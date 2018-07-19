<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProdutosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('produtos', function(Blueprint $table)
		{
			$table->foreign('categoria_id', 'fk_produtos_categoria1')->references('id')->on('categorias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('marca_id', 'fk_produtos_marca1')->references('id')->on('marcas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('produtos', function(Blueprint $table)
		{
			$table->dropForeign('fk_produtos_categoria1');
			$table->dropForeign('fk_produtos_marca1');
		});
	}

}
