<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bbs_post_id');
            $table->text('body');
            $table->timestamps();
            
            $table->foreign('bbs_post_id')->references('id')->on('bbs_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbs_comments');
    }
}
