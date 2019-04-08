<?php

use Illuminate\Database\Seeder;

class ProductModelsInstallGuidesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('product_models_install_guides')->insert([
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)],
			['model_id' => rand(1, 7), 'guide_id' => rand(1, 20)]
		]);
	}
}
