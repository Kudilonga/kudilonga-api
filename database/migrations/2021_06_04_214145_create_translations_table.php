<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('word1_id')->unsigned();
            $table->bigInteger('word2_id')->unsigned();

            $table->foreign('word1_id')
                ->references('id')
                ->on('words')
                ->onDelete('cascade');

                $table->foreign('word2_id')
                    ->references('id')
                    ->on('words')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('translations');
    }
}
