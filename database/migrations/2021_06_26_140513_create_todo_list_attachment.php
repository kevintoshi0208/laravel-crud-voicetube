<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_list_attachments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('file_path',140);
            $table->string('file_name',140);
            $table->string('mimetype',140);
        });

        Schema::table('todo_lists', function(Blueprint $table) {
            $table->dropColumn('file_path');
            $table->dropColumn('mimetype');
            $table->dropColumn('attachment');
            $table->dropColumn('file_name');
            $table->unsignedBigInteger('todo_list_attachment_id')->nullable();
            $table->foreign('todo_list_attachment_id')
                ->references('id')->on('todo_list_attachments');
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
            $table->string('file_path',140);
            $table->string('mimetype',140);
            $table->mediumText('attachment');
            $table->string('file_name',140);
            $table->dropConstrainedForeignId('todo_list_attachment_id');
        });

        Schema::dropIfExists('todo_list_attachments');
    }
}
