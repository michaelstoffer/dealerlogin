<?php

use Illuminate\Database\Seeder;
use App\WarrantyContact;

class WarrantyContactTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\WarrantyContact::class, 50)->create();
	}
}
