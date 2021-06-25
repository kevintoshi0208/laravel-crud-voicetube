<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $fillable  = [
        'title',
        'content',
        'attachment',
        'file_name',
        'file_path',
        'mime_type',
        'done_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'done_at'
    ];

}
