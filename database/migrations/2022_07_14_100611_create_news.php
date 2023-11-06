<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id_news');
            $table->text('image_news');
            $table->text('title_news');
            $table->text('slug_news');
            $table->text('summary_news');
            $table->text('content_news');
            $table->integer('number_comments');
            $table->integer('number_views');
            $table->tinyInteger('is_hot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
