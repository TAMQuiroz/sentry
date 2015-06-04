<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requirements', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->date('limitDate');
			$table->date('initDate');
			$table->date('registerDate');
			$table->integer('status');
			$table->string('observation');
			$table->integer('employeeID');
			$table->integer('role');
			$table->integer('formID');

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
		Schema::drop('requirements');
	}

}
