<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostIdToBlogTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_tags', function (Blueprint $table) {
            $table->unsignedInteger('post_id')->nullable();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_tags', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropColumn('post_id');
        });
    }
}
