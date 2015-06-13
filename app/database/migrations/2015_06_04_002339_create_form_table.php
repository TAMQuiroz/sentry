<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('form', function($table){
			$table->increments('id');
			$table->integer('employeeID');
			$table->integer('bossID');
			$table->integer('areaID');	
			$table->integer('equipo'); 		//0 no requiere | 1 laptop | 2 pc
			$table->integer('puntoRed');
			$table->string('mail');	
			$table->integer('sapR3');
			$table->string('sapR3Just');
			$table->integer('sapDP');
			$table->string('sapDPJust');
			$table->integer('sapBW');
			$table->string('sapBWJust');
			$table->integer('accesoInternet');
			$table->integer('accesoCarpetas');
			$table->string('usuarioConecta');
			$table->string('obsConecta');
			$table->integer('conexionImpresora');
			$table->integer('listaCorporativa');
			$table->integer('incluirDirectorio');
			$table->integer('lync');
			$table->integer('rpm');
			$table->integer('nivelClaveTelefonica');
			$table->integer('anexo');
			$table->integer('automovil');
			$table->integer('status');
			$table->date('registryDate');
			$table->integer('statusEnd');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('form');
	}

}
