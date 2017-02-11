<?php

use Illuminate\Database\Seeder;

class FakeNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Network\Network::class, 50)->create();
    }
}
