<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('address_en');
            $table->string('address_ar');
            $table->string('phone');
            $table->text('map');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'email' => 'info@venus.com',
            'address_en' => 'The 5th Settlement, Cairo, Egypt',
            'address_ar' => 'The 5th Settlement, Cairo, Egypt',
            'phone' => '0123456789',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13820.640417611967!2d31.41752148787649!3d30.003558842644303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583cc75436d909%3A0x7f921d4528ec3e03!2sThe%205th%20Settlement%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1645673189467!5m2!1sen!2seg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
