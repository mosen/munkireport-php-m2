<?php

use Illuminate\Database\Seeder;

class FakeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MrModule\Comment\Comment::class, 50)->create();
    }
}
