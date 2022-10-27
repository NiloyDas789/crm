<?php

namespace App\Models\Dashboard;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'street',
      'city_id',
      'zip_code',
      'email',
      'phone',
      'mobile',
      'contact_person_id',
      'admin_id',
    ];

    public function agents(){
        return $this->hasMany(Agent::class);
    }


    public function admin(){
        return $this->belongsTo(User::class,'admin_id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function contactPerson(){
        return $this->belongsTo(User::class,'contact_person_id','id');
    }
}
