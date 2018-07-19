<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 45);
			$table->float('valor', 10, 0);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('marca_id')->unsigned()->index('fk_produtos_marca1_idx');
			$table->integer('categoria_id')->unsigned()->index('fk_produtos_categoria1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('produtos');
	}

}
