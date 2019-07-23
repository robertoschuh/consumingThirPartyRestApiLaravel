<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name' => 'UK',
        'alpha2Code' => 'uk',
        'capital' => 'London',
        'currency_code' => 'gb',
        'country_language' => 'english'
    ];
});
