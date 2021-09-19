<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Url;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Url::class, function (Faker $faker) {
    $name = $faker->name;

    $date = Carbon::now();
    $date->addDays(7);
    $dateExpiration = $date->format("Y-m-d");

    return [
        'url_original' => $faker->url,
        'url_shortened' => $faker->unique()->userName,
        'date_expiration' => $dateExpiration,
    ];
});
