<?php

class EmployeeSeeder extends Seeder {

	public function run()
	{
		Employee::create(array('name'=>'Claudia','lastname'=>'Villanueva','roleId'=>'2','roleName'=>'Asistente','boss_id'=>'1', 'area_id'=>'1'));
		Employee::create(array('name'=>'Samoel','lastname'=>'Sarmiento','roleId'=>'1','roleName'=>'Analista','boss_id'=>'1', 'area_id'=>'2'));
		Employee::create(array('name'=>'Andrea','lastname'=>'Bravo','roleId'=>'0','roleName'=>'Jefe','boss_id'=>'1', 'area_id'=>'3'));
	}
}