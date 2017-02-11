<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\TimeMachine\TimeMachine::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'last_success' => $faker->dateTimeThisDecade,
        'last_failure' => $faker->dateTimeThisDecade,
        'last_failure_msg' => $faker->words,
        'duration' => $faker->numberBetween(0, 100000)
    ];
});