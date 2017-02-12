<?php
namespace MrModule\ARD;

use Illuminate\Database\Seeder;

class FakeARDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ARDInfo::class, 50)->create();
    }
}
