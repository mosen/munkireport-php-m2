<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\CrashPlan\CrashPlan::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'destination' => $faker->word,
        'last_success' => $faker->dateTimeThisDecade,
        'duration' => $faker->randomNumber(4),
        'last_failure' => $faker->dateTimeThisDecade,
        'reason' => $faker->text
    ];
});