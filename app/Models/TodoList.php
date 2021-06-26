<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $keyType = 'string';

    protected $hidden = ['todo_list_attachment_id'];

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
        'done_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'done_at'
    ];

    public function scopeTitle($qb,$title)
    {
        $qb->where('title','like','%'.$title.'%');
    }

    public function scopeContent($qb,$content)
    {
        $qb->where('content','like','%'.$content.'%');
    }

    public function scopePaginate($qb,$page)
    {
        $qb->paginate($page);
    }

    public function scopeDoneAtGte($qb,$date){
        $qb->where('done_at','>=',$date);
    }

    public function scopeDoneAtLte($qb,$date){
        $qb->where('done_at','<=',$date);
    }


    public function attachment()
    {
        return $this->belongsTo(TodoListAttachment::class,'todo_list_attachment_id');
    }
}
