<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(UsersTableSeeder::class);
		$this->call(DealersTableSeeder::class);
		$this->call(ProductLineTableSeeder::class);
		$this->call(ProductModelTableSeeder::class);		
		// $this->call(VendorTableSeeder::class);
		// $this->call(ProductTableSeeder::class);
		// $this->call(TroubleShootingManualTableSeeder::class);
		// $this->call(TroubleShootingVideoTableSeeder::class);
		// $this->call(InstallGuideTableSeeder::class);
		// $this->call(ServiceBulletinTableSeeder::class);
		// $this->call(WarrantyContactTableSeeder::class);
		// $this->call(WarrantyTableSeeder::class);
		// $this->call(ProductCategoryTableSeeder::class);
		// $this->call(TrainingVideoTableSeeder::class);
		// $this->call(ProductModelsInstallGuidesTableSeeder::class);
		// $this->call(ProductModelsProductCategoriesTableSeeder::class);
		// $this->call(ProductModelsServiceBulletinsTableSeeder::class);
	}
}
