<?php

use Illuminate\Database\Seeder;

class FakeProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Profile\Profile::class, 50)->create();
    }
}
