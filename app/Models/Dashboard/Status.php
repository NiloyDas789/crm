<?php

namespace App\Models\Dashboard;

use App\Models\PaymentStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

}
