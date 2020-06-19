<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('image_url')->nullable();
            $table->boolean('isFavourite')->default(0)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')->onDelete('cascade');

            $table->unsignedBigInteger('genre_id')->nullable();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
