<?php

class TaskTypeSeeder extends Seeder {

	public function run()
	{
		TaskType::create(array('duracionEstimada'=>'3'));
		TaskType::create(array('duracionEstimada'=>'2'));
	}
}