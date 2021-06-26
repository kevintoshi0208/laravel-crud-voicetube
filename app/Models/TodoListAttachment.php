<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoListAttachment extends Model
{
    use HasFactory;

    protected $hidden = ['file_path'];

    protected $fillable  = [
        'file_name',
        'mimetype',
    ];

    protected $appends = array('link');

    public function getLinkAttribute()
    {
        return "api/todoListAttachment/".$this->id."/download";
    }

    /**
     * Get the phone record associated with the user.
     */
    public function todoList()
    {
        return $this->hasOne(TodoList::class,'todo_list_attachment_id','id');
    }


}
