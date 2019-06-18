<?php

namespace App;

use App\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function distrcits()
    {
        return $this->hasMany(District::class);
    }
}
