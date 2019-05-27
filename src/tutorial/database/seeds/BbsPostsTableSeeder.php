<?php

use Illuminate\Database\Seeder;
use App\BbsPost;
use App\BbsComment;

class BbsPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory( BbsPost::class, 50 )
        ->create()
        ->each( function ($post) {
            $comments = factory( App\BbsComment::class, 2 )->make();
            $post->comments()->saveMany( $comments );
        } );
    }
}
