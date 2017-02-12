<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(MrModule\DiskReport\DiskReport::class, function (Faker\Generator $faker) {
    return [
        'serial_number' => $faker->unique()->regexify('[A-Z0-9]{12}'),
        'TotalSize' => $faker->randomNumber(7),
        'FreeSpace' => $faker->randomNumber(7),
        'Percentage' => $faker->numberBetween(0, 100),
        'SMARTStatus' => $faker->randomElement(['Not Supported', 'Verified']),
        'VolumeType' => $faker->randomElement(['ssd', 'hdd']),
        'BusProtocol' => $faker->randomElement(['PCI', 'SATA']),
        'Internal' => $faker->boolean,
        'MountPoint' => '/',
        'VolumeName' => 'Macintosh HD',
        'CoreStorageEncrypted' => $faker->boolean
    ];
});