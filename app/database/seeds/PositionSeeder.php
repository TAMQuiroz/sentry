<?php

class PositionSeeder extends Seeder {

	public function run()
	{
		Profile::create(array('name'=>'Analista de composiciones'));
		Profile::create(array('name'=>'Practicante de proyectos'));
		Profile::create(array('name'=>'Gerente de Administracion'));
		Profile::create(array('name'=>'Practicante de desarrollo organizacional'));
	}
}