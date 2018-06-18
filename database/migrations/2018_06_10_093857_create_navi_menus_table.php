<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaviMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navi_menus', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title')->nullable(false);
            $table->string('code')->unique();
            $table->integer('order')->nullable(true);
            $table->boolean('visible')->default(false);
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
        Schema::dropIfExists('navi_menus');
    }
}
