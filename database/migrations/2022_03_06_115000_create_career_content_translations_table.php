<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCareerContentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_content_translations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('career_content_id');
            $table->string('locale')->index();
            $table->unique(['career_content_id', 'locale']);
            $table->foreign('career_content_id')->references('id')->on('career_contents')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('career_content_translations')->insert([
            'description' => 'description',
            'locale' => 'en',
            'career_content_id' => 1
        ]);
        DB::table('career_content_translations')->insert([
            'description' => 'description',
            'locale' => 'ar',
            'career_content_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_content_translations');
    }
}
