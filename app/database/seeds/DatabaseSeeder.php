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

		$this->call('UserTableSeeder');
		$this->call('CountyTableSeeder');
		$this->call('HouseTypeTableSeeder');
		$this->call('SalesTypeTableSeeder');
		$this->call('CityTableSeeder');
    $this->call('PropertyTableSeeder');
	}

}