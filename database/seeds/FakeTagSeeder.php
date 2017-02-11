<?php

use Illuminate\Database\Seeder;

class FakeTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Tag\Tag::class, 50)->create();
    }
}
