<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkflowStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'workflow_id',
    ];

    public function workflow(){
        return $this->belongsTo(Workflow::class);
    }

}
