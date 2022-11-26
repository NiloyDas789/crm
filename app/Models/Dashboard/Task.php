<?php

namespace App\Models\Dashboard;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
      'title',
      'category',
      'assignee_id',
      'priority',
      'due_date',
      'due_time',
    ];


    public function user(){
        return $this->belongsTo(User::class,'id','assignee_id');
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class,'applications_tasks','task_id','application_id');
    }
}
