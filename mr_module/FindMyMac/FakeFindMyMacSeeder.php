<?php
namespace MrModule\FindMyMac;

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
        factory(FindMyMacInfo::class, 50)->create();
    }
}
