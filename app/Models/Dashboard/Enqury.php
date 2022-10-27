<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enqury extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'email',
      'mobile',
      'higher_level_education',
      'comment',
    ];
}
