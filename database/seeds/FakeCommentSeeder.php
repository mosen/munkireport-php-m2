<?php
use Illuminate\Database\Seeder;
use Mr\Comment;

class FakeCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 50)->create();
    }
}
