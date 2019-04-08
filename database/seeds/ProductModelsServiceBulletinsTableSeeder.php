<?php

use Illuminate\Database\Seeder;

class ProductModelsServiceBulletinsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('product_models_service_bulletins')->insert([
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)],
			['model_id' => rand(1, 7), 'bulletin_id' => rand(1, 10)]
		]);
	}
}
