<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Laratube\Model;
use Faker\Generator as Faker;

$factory->define(\Laratube\Subscription::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\Laratube\User::class)->create()->id;
        },
        'channel_id' => function() {
            return factory(\Laratube\Channel::class)->create()->id;
        },
    ];
});
