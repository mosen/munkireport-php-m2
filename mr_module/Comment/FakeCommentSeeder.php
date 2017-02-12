<?php
namespace MrModule\Comment;

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
        factory(Comment::class, 50)->create();
    }
}
