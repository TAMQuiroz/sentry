<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('AreasSeeder');
		$this->call('CorpListsSeeder');
		$this->call('EmployeeSeeder');
		$this->call('PositionSeeder');
		$this->call('TaskTypeSeeder');

	}

}
