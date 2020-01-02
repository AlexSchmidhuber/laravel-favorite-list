<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationTypeToFavoriteListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorite_lists', function (Blueprint $table) {
            $table->enum('relation_type', ['member', 'listitem'])->nullable()->default('listitem');
            $table->string('member_role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorite_lists', function (Blueprint $table) {
            $table->dropColumn('relation_type', 'member_role');
        });
    }
}
