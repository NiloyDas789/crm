<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'street',
        'city_id',
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function partners(){
        return $this->hasMany(Partner::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
