<?php

use Illuminate\Database\Seeder;

class TrainingVideoTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\TrainingVideo::class, 30)->create();
	}
}
