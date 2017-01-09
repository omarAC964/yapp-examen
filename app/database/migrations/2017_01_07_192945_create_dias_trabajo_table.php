<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiasTrabajoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dias_trabajo', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('dia');
			$table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('restaurants_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dias_trabajo');
	}

}
