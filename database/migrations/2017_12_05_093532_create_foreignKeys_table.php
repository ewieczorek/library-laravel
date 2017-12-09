<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('shelf_id')->references('id')->on('shelves');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_shelf_id_foreign');
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->dropForeign('loans_user_id_foreign');
            $table->dropForeign('loans_book_id_foreign');
        });

        Schema::dropIfExists('foreignKeys');
    }
}
