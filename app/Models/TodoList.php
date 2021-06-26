<?php

namespace App\Models;

use http\Client\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /**
     * Get the phone associated with the user.
     */
    public function attachment()
    {
        return $this->hasOne(TodoListAttchment::class);
    }
}
