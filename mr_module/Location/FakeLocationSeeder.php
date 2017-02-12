<?php
namespace MrModule\Location;

use Illuminate\Database\Seeder;

class FakeLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Location::class, 50)->create();
    }
}
