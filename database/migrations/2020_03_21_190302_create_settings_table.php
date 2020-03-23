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
            $table->string('key', 50)->unique();
            $table->string('value', 255);
            $table->string('human_description', 255);
            $table->timestamps();
        });

        DB::table('settings')->insert([
            [
                'key' => 'phone_number',
                'value' => '31-337',
                'human_description' => 'Телефон на главной странице'
            ], [
                'key' => 'orders_mail_to',
                'value' => 'admin@abuse.net',
                'human_description' => 'Отправлять заказы на почту'
            ]
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
