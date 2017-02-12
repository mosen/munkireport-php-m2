<?php
namespace MrModule\Network;

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
        factory(Network::class, 50)->create();
    }
}
