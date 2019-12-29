<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteListTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->date('active_until');

            $table->uuid('uuid');
            $table->string('name');
            $table->unsignedBigInteger('user_id')->nullable()->comment('favorite list owner');

            $table->json('json')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('favorite_listables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('favorite_list_id');
            $table->morphs('listable');

            $table->json('json')->nullable();

            $table->foreign('favorite_list_id')->references('id')->on('favorite_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_lists');

        Schema::dropIfExists('favorite_listables');
    }
}
