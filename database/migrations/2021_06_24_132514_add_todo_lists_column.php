<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodoListsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todo_lists', function(Blueprint $table) {
            $table->string('file_path',140);
            $table->string('mimetype',140);
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
            $table->dropColumn('file_path');
            $table->dropColumn('mimetype');
        });
    }
}
