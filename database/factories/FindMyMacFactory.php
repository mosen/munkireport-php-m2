<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\FindMyMac\FindMyMacInfo::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'status' => $faker->words,
        'ownerdisplayname' => $faker->name,
        'email' => $faker->email,
        'personid' => $faker->randomDigit,
        'hostname' => $faker->userName
    ];
});