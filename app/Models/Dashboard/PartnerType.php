<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function partners(){
         return $this->hasMany(Partner::class);
    }
}
