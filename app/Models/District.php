<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
