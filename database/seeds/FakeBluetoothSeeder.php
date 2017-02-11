<?php

use Illuminate\Database\Seeder;

class FakeBluetoothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Bluetooth\BluetoothInfo::class, 50)->create();
    }
}
