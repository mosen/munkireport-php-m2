<?php
use Illuminate\Database\Seeder;
use Mr\Event;

class FakeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class, 50)->create();
    }
}
