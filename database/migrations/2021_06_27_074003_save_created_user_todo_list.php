<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaveCreatedUserTodoList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todo_list_attachments', function (Blueprint $table) {
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->foreign('created_user_id')
                ->references('id')->on('users');
        });

        Schema::table('todo_lists', function(Blueprint $table) {
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->foreign('created_user_id')
                ->references('id')->on('users');
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
            $table->dropConstrainedForeignId('created_user_id');
        });

        Schema::table('todo_list_attachments', function(Blueprint $table) {
            $table->dropConstrainedForeignId('created_user_id');
        });
    }
}
