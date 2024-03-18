<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandStoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_story_translations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('mission');
            $table->text('values');
            $table->text('vision');
            $table->unsignedBigInteger('brand_story_id');
            $table->string('locale')->index();
            $table->unique(['brand_story_id', 'locale']);
            $table->foreign('brand_story_id')->references('id')->on('brand_stories')->onDelete('cascade');
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
        Schema::dropIfExists('brand_story_translations');
    }
}
