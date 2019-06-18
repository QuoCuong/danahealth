<?php

namespace App;

use App\Image;
use App\Supplier;
use App\OrderDetail;
use App\MedicineGroup;
use App\MedicineDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Medicine extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    protected $fillable = [
        'name', 'description', 'unit', 'quantity', 'price', 'exp', 'medicine_group_id', 'supplier_id',
    ];

    protected $softCascade = [
        'medicineDetail', 'images', 'orderDetails',
    ];

    public function medicineDetail()
    {
        return $this->hasOne(MedicineDetail::class);
    }

    public function medicineGroup()
    {
        return $this->belongsTo(MedicineGroup::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
