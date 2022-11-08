<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
      'image',
      'master_category_id',
      'partner_type_id',
      'name',
      'partner_id',
      'business_registration_number',
      'service_workflow_id',
      'currency_id',
      'street',
      'zip_code',
      'city_id',
      'phone',
      'email',
      'fax',
      'website',
      'office_id',
    ];


    public function partnerType(){
        return $this->belongsTo(PartnerType::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
