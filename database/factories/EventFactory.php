<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Mr\Event::class, function (Faker\Generator $faker) {
    $modules = [
        'ard',
        'backup2go',
        'bluetooth',
        'certificate',
        'comment',
        'crashplan',
        'deploystudio',
        'directory_service'
    ];

    $type = [
        'danger',
        'warning',
        'info',
        'success'
    ];

    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'type' => $faker->randomElement($type),
        'module' => $faker->randomElement($modules),
        'msg' => $faker->text,
        'data' => $faker->text
    ];
});