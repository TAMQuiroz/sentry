<?php

class PositionSeeder extends Seeder {

	public function run()
	{
		Position::create(array('name'=>'Analista de composiciones'));
		Position::create(array('name'=>'Practicante de proyectos'));
		Position::create(array('name'=>'Gerente de Administracion'));
		Position::create(array('name'=>'Practicante de desarrollo organizacional'));
	}
}