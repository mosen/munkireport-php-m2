<?php
namespace MrModule\Display;

use Illuminate\Database\Seeder;

class FakeDisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Display::class, 50)->create();
    }
}
