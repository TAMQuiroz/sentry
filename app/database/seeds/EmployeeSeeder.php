<?php

class EmployeeSeeder extends Seeder {

	public function run()
	{
		Employee::create(array('name'=>'Claudia','lastname'=>'Villanueva','boss_id'=>'1', 'area_id'=>'1'));
		Employee::create(array('name'=>'Samoel','lastname'=>'Sarmiento','boss_id'=>'1', 'area_id'=>'2'));
		Employee::create(array('name'=>'Andrea','lastname'=>'Bravo','boss_id'=>'1', 'area_id'=>'3'));
	}
}