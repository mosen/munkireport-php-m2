<?php
namespace MrModule\MunkiInfo;

use Illuminate\Database\Seeder;

class FakeMunkiInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MunkiInfo::class, 50)->create();
    }
}
