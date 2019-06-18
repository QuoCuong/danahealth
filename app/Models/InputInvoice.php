<?php

namespace App;

use App\Staff;
use App\Supplier;
use App\InputInvoiceDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InputInvoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date', 'total', 'supplier_id', 'admin_id',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function inputInvoiceDetails()
    {
        return $this->hasMany(InputInvoiceDetail::class);
    }
}
