<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
    ];


    public function state(){
        return $this->belongsTo(State::class);
    }
    public function agents(){
        return $this->hasMany(Agent::class);
    }
    public function branches(){
        return $this->hasMany(Branch::class);
    }
    public function offices(){
        return $this->hasMany(Office::class);
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }

    public function partners(){
        return $this->hasMany(Partner::class);
    }

}
