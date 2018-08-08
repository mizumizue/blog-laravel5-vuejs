<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title')->nullable(true);
            $table->string('description')->nullable(true);
            $table->string('keywords')->nullable(true);
            $table->string('url')->nullable(true);
            $table->string('domain')->nullable(true);
            $table->string('author')->nullable(true);
            $table->string('email')->nullable(true);
            $table->uuid('image')->nullable(true);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->primary('id');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
