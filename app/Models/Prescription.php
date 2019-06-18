<?php

namespace App;

use App\District;
use App\Image;
use App\Order;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date', 'phone', 'email', 'fullname', 'address', 'status', 'district_id', 'member_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
