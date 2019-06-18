<?php

namespace App;

use App\InputInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InputInvoiceDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'quantity', 'lot', 'subtotal', 'exp', 'medicine_id', 'input_invoice_id',
    ];

    public function inputInvoice()
    {
        return $this->belongsTo(InputInvoice::class);
    }
}
