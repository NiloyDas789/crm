<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
      'client_id',
      'application_id',
      'installment_name',
      'installment_date',
      'discount',
      'invoice_date',
      'amount',
    ];
}
