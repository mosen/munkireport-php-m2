<?php
namespace MrModule\Bluetooth;

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
        factory(BluetoothInfo::class, 50)->create();
    }
}
