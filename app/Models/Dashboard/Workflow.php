<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_accessible',
    ];
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
