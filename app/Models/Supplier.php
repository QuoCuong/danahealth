<?php

namespace App;

use App\Medicine;
use App\InputInvoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Supplier extends Model
{
    use SoftDeletes, SoftCascadeTrait;

    protected $fillable = [
        'name', 'email', 'address', 'phone', 'country',
    ];

    protected $softCascade = [
        'medicines', 'input_invoices',
    ];

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function input_invoices()
    {
        return $this->hasMany(InputInvoice::class);
    }
}
