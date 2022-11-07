<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'application_id',
        'task_id',
    ];
    public function tasks()
    {
        return $this->belongsTo(Task::class,'task_id', 'id');
    }
}
