<?php

use Illuminate\Database\Seeder;

class ProductLineTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('product_lines')->insert([
			['name' => 'Flyer', 'created_at' => now(), 'updated_at' => now()],
			['name' => 'Luna', 'created_at' => now(), 'updated_at' => now()],
			['name' => 'Sol', 'created_at' => now(), 'updated_at' => now()]
		]);
	}
}
