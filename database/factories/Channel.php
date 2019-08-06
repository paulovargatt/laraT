<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laratube\Model;
use Faker\Generator as Faker;

$factory->define(\Laratube\Channel::class, function (Faker $faker) {
    return [
       'name' => $faker->sentence(3),
        'user_id' => function() {
            return factory(\Laratube\User::class)->create()->id;
        },
        'description' => $faker->sentence(30)
    ];
});
