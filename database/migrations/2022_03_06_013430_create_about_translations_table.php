<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('mission');
            $table->text('values');
            $table->text('vision');
            $table->text('certificates');
            $table->unsignedBigInteger('about_id');
            $table->string('locale')->index();
            $table->unique(['about_id', 'locale']);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('about_translations')->insert([
            'description' => 'description',
            'mission' => 'mission',
            'values' => 'values',
            'vision' => 'vision',
            'certificates' => 'certificates',
            'about_id' => 1,
            'locale' => 'en'
        ]);

        DB::table('about_translations')->insert([
            'description' => 'description',
            'mission' => 'mission',
            'values' => 'values',
            'vision' => 'vision',
            'certificates' => 'certificates',
            'about_id' => 1,
            'locale' => 'ar'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
}
