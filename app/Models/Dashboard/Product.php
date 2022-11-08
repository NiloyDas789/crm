<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'partner_id',
      'office_id',
      'product_type_id',
      'revenue_type_id',
      'duration',
      'intake_month_id',
      'description',
      'note',
    ];

    public function partner(){
        return $this->belongsTo(Partner::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function productType(){
        return $this->belongsTo(ProductType::class);
    }

    public function revenueType(){
        return $this->belongsTo(RevenueType::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
