<?php

use Illuminate\Database\Seeder;

class FakeFindMyMacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\FindMyMac\FindMyMacInfo::class, 50)->create();
    }
}
