<?php

class UserSeeder extends Seeder {

	public function run()
	{
		User::create(array('name'=>'Busy Partner','email'=>'bp@a','password'=> Hash::make('1'), 'role_id'=>'1'));
		User::create(array('name'=>'Bossy Boss','email'=>'b@a','password'=> Hash::make('1'), 'role_id'=>'2'));
		User::create(array('name'=>'Col Infraestructure','email'=>'ci@a','password'=> Hash::make('1'), 'role_id'=>'3'));
		User::create(array('name'=>'Col Administrative','email'=>'ca@a','password'=> Hash::make('1'), 'role_id'=>'4'));
		User::create(array('name'=>'Enny Enabler','email'=>'e@a','password'=> Hash::make('1'), 'role_id'=>'5'));
	}
}