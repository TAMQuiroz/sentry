<?php

class CorpListsSeeder extends Seeder {

	public function run()
	{
		CorpList::create(array('name'=>'LD Alicorp-LD Alicorp Peru'));
		CorpList::create(array('name'=>'LD Alicorp Empleado'));
		CorpList::create(array('name'=>'LD Alicorp Predio Central-Peru'));
		CorpList::create(array('name'=>'LD Alicorp Edificio Central'));
		CorpList::create(array('name'=>'LD Alicorp RRHH Corporativo'));
		CorpList::create(array('name'=>'LD Alicorp Finanzas'));
		CorpList::create(array('name'=>'LD Alicorp Marketing'));
		CorpList::create(array('name'=>'LD Alicorp Supply Chain'));
		CorpList::create(array('name'=>'LD Alicorp Consumo Masivo'));
		CorpList::create(array('name'=>'LD Alicorp NPI (Alicorp Soluciones)'));
		CorpList::create(array('name'=>'LD Alicorp NNA (Vitapro)'));

	}
}