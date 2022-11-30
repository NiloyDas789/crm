<?php

namespace App\Models\Dashboard;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

     protected $fillable=[
         'image',
         'first_name',
         'last_name',
         'dob',
         'client_id',
         'email',
         'phone',
         'contact_reference',
         'street',
         'city_id',
         'zip_code',
         'visa_expiry_date',
         'application',
         'assignee_id',
         'followers',
         'source',
         'tag_name',
         'rating',
     ];

     public function user(){
         return $this->belongsTo(User::class,'id','assignee_id');
     }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function fullname()
    {
        return "$this->first_name $this->last_name";
    }

}
