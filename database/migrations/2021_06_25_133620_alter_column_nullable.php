<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todo_lists', function(Blueprint $table) {
            $table->string('file_path',140)->nullable()->change();
            $table->string('mimetype',140)->nullable()->change();
            $table->mediumText('attachment')->nullable()->change();
            $table->string('file_name',140)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todo_lists', function(Blueprint $table) {
            $table->string('file_path',140)->nullable(false)->change();
            $table->string('mimetype',140)->nullable(false)->change();
            $table->mediumText('attachment')->nullable(false)->change();
            $table->string('file_name',140)->nullable(false)->change();
        });
    }
}
