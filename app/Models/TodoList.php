<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $keyType = 'string';

    protected $dateFormat = 'U';

    protected $fillable = [
        'title',
        'content',
        'attachment',
        'file_name',
        'file_path',
        'mime_type',
        'done_At'
    ];

}
