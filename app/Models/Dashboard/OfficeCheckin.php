<?php

namespace App\Models\Dashboard;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeCheckin extends Model
{
    use HasFactory;

    protected $fillable =[
        'date',
        'start',
        'wait_time',
        'contact_id',
        'visit_purpose',
        'assignee_id',
        'status'
    ];

    public function assignee(){
        return $this->belongsTo(User::class,'assignee_id');
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
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
