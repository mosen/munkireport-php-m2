<?php
namespace MrModule\Power;

use Illuminate\Database\Seeder;

class FakePowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Power::class, 50)->create();
    }
}
