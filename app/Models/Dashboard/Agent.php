<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'agent_type',
      'agent_structure',
      'image',
      'phone',
      'email',
      'street',
      'city_id',
      'office_id',
    ];


    public function city(){
        return $this->belongsTo(City::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }
}
