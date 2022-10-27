<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Protect $dates
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * he attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'abbr',
        'offset',
        'isdst',
        'text',
        'utc',
    ];

    /**
     * @param $utc
     * @return mixed
     */
    public function setUtcAttribute($utc)
    {
        $this->attributes['utc'] = json_encode($utc);
    }

    /**
     * @param $utc
     * @return mixed
     */
    public function getUtcAttribute($utc)
    {
        return json_decode($utc);
    }

    /**
     * Get all the countries from the JSON file.
     *
     * @return array
     */
    public static function allJSON()
    {
        $route = dirname(dirname(__FILE__)) . '/data/time_zones.json';

        return json_decode(file_get_contents($route), true);
    }
}
