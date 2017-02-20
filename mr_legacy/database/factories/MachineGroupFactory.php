<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrLegacy\MachineGroup::class, function (Faker\Generator $faker) {
    $properties = [
        \MrLegacy\MachineGroup::PROP_NAME,
        \MrLegacy\MachineGroup::PROP_KEY
    ];

    return [
        'groupid' => $faker->randomNumber,
        'property' => $faker->randomElement($properties),
        'value' => $faker->randomNumber
    ];
});