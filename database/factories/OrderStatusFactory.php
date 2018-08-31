<?php

use App\Models\Order\OrderStatus;
use Faker\Generator as Faker;

$factory->define(OrderStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
