<?php

use Illuminate\Database\Seeder;

class ProductModelTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('product_models')->insert([
			['line_id' => 1, 'name' => 'Flyer Chase', 'created_at' => now(), 'updated_at' => now()],
			['line_id' => 1, 'name' => 'Flyer Pursue', 'created_at' => now(), 'updated_at' => now()],
			['line_id' => 1, 'name' => 'Flyer Explore', 'created_at' => now(), 'updated_at' => now()],
			['line_id' => 2, 'name' => 'Luna', 'created_at' => now(), 'updated_at' => now()],
			['line_id' => 2, 'name' => 'Luna Lite', 'created_at' => now(), 'updated_at' => now()],
			['line_id' => 2, 'name' => 'Luna Rover', 'created_at' => now(), 'updated_at' => now()],
			['line_id' => 3, 'name' => 'Sol', 'created_at' => now(), 'updated_at' => now()]
		]);
	}
}
