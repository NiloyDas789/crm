<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'dob',
        'email',
        'phone',
        'street',
        'city_id',
        'zip_code',
    ];
}
