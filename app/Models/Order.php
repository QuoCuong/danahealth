<?php

namespace App;

use App\OrderDetail;
use App\Prescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date', 'total', 'status', 'prescription_id',
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
