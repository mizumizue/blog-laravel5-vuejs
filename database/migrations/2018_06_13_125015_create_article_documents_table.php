<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_documents', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('article_id')->unique();
            $table->string('path', 256)->nullable(true);
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
        Schema::dropIfExists('article_documents');
    }
}
