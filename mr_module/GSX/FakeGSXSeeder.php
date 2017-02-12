<?php
namespace MrModule\GSX;

use Illuminate\Database\Seeder;

class FakeGSXSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GSXInfo::class, 50)->create();
    }
}
