<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use App\Transaction;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Transaction::class, function (Faker $faker) {

	$seller = Seller::has('products')->get()->random();
	$buyer = User::all()->except($seller->id)->random();

	return [
		'quantity' => $faker->numberBetween(1, 3),
		'buyer_id' => $buyer,
		'product_id' => $seller->products->random()->id,
	];
});
