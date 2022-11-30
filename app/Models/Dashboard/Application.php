<?php

namespace App\Models\Dashboard;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
      'client_id',
      'workflow_id',
      'partner_id',
      'office_id',
      'product_id',
      'started_at',
      'ended_at',
      'applied_intake',
      'note_title',
      'note_description',
      'assignee_id',
      'application_form_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }
    public function partner(){
        return $this->belongsTo(Partner::class);
    }

    public function workflow(){
        return $this->belongsTo(Workflow::class);
    }

    public function assignee(){
        return $this->belongsTo(User::class,'assignee_id');
    }


    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'applications_tasks','application_id','task_id');
    }

    public function scopeSearchFilter($query, $filterData, $queryData, $id, $relation)
    {
        return $query->when($filterData == $id, function ($query) use ($queryData, $relation) {
                return $query->whereHas($relation, function ($q) use ($queryData) {
                    return $q->where('name', 'like', '%' . $queryData . '%');
                });
            });
    }

}
