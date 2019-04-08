<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
	return [
		'first_name' => $faker->firstName(),
		'last_name' => $faker->lastName,
		'email' => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
		'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		'remember_token' => str_random(10),
	];
});

$factory->define(App\Dealer::class, function (Faker $faker) {
	return [
		'name' => $faker->name(),
	];
});

$factory->define(App\InstallGuide::class, function (Faker $faker) {
	return [
		'line_id' => $faker->numberBetween(1, 3),
		'name' => $faker->company,
		'years' => $faker->year(),
		'pdf' => $faker->file('public/storage/files', 'public/storage/pdfs'),
	];
});

$factory->define(App\ServiceBulletin::class, function (Faker $faker) {
	return [
		'line_id' => $faker->numberBetween(1, 3),
		'name' => $faker->company,
		'range' => $faker->monthName().'/'.$faker->year(),
		'pdf' => $faker->file('public/storage/files', 'public/storage/pdfs'),
	];
});

$factory->define(App\Vendor::class, function (Faker $faker) {
	return [
		'name' => $faker->company,
	];
});

$factory->define(App\WarrantyContact::class, function (Faker $faker) {
	$phone = $faker->phoneNumber;

	return [
		'vendor_id' => $faker->numberBetween(1, 50),
		'phone' => $phone,
		'customer_service_phone' => $phone,
		'technical_support_phone' => $faker->phoneNumber,
		'warranty_phone' => $faker->phoneNumber,
		'customer_service_email' => $faker->unique()->safeEmail,
		'technical_support_email' => $faker->unique()->safeEmail,
		'warranty_email' => $faker->unique()->safeEmail,
		'website' => $faker->safeEmailDomain,
		'pdf' => $faker->file('public/storage/files', 'public/storage/pdfs'),
	];
});

$factory->define(App\ProductLine::class, function (Faker $faker) {
	return [
		'name' => $faker->name(),
	];
});

$factory->define(App\ProductModel::class, function (Faker $faker) {
	return [
		'line_id' => $faker->numberBetween(1, 3),
		'name' => $faker->name(),
	];
});

$factory->define(App\ProductCategory::class, function (Faker $faker) {
	return [
		'name' => $faker->name(),
	];
});

$factory->define(App\Product::class, function (Faker $faker) {
	return [
		'product_model_id' => $faker->numberBetween(1, 7),
		'product_category_id' => $faker->numberBetween(1, 50),
		'name' => $faker->name(),
	];
});

$factory->define(App\TroubleShootingManual::class, function (Faker $faker) {
	return [
		'product_id' => $faker->numberBetween(1, 50),
		'name' => $faker->name(),
		'pdf' => $faker->file('public/storage/files', 'public/storage/pdfs'),
	];
});

$factory->define(App\TroubleShootingVideo::class, function (Faker $faker) {
	return [
		'product_id' => $faker->numberBetween(1, 50),
		'name' => $faker->name(),
		'video_code' => '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/altVHE6stJE?rel=0&amp;showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
		'embed' => '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/altVHE6stJE?rel=0&amp;showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	];
});

$factory->define(App\TrainingVideo::class, function (Faker $faker) {
	return [
		'product_model_id' => $faker->numberBetween(1, 7),
		'heading' => $faker->name(),
		'video_code' => '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/altVHE6stJE?rel=0&amp;showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
		'embed' => '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/altVHE6stJE?rel=0&amp;showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
	];
});
