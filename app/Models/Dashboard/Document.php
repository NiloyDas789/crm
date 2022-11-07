<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
      'url',
      'application_id',
      'task_id',
    ];

    public function tasks()
    {
        return $this->belongsTo(Task::class,'task_id', 'id');
    }
}
