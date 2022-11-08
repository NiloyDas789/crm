<?php

namespace App\Models\Dashboard;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'related_id',
        'user_id',
        'client_id',
        'partner_id',
        'time_zone_id',
        'date',
        'time',
        'title',
        'description',
        'invitees_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function timezone(){
        return $this->belongsTo(TimeZone::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
