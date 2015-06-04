<?php

class AreasSeeder extends Seeder {

	public function run()
	{
		Area::create(array('name'=>'R.R.H.H','description'=>'Recursos Humanos','location'=>'3er Piso'));
		Area::create(array('name'=>'Secretaria','description'=>'Secretarios y secretarias','location'=>'2er Piso'));
		Area::create(array('name'=>'Comercial','description'=>'Marketing','location'=>'1er Piso'));
	}
}