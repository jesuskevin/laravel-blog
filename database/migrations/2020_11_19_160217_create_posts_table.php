<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories'); //Nueva forma de declarar relaciones explicitamente
            $table->string('title');
            $table->longText('content');
            $table->string('author')->default('Anonymous');
            $table->string('picture');
            $table->timestamps();

            //Forma antiga de declarar realciones explicitamente
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->categories();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
