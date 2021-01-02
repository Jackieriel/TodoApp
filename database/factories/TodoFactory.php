<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(App\Models\Todo::class, function (Faker $faker) {
    return [
        'task'=>$faker->sentence(10),
    ];
});
