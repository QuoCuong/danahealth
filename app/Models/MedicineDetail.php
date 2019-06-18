<?php

namespace App;

use App\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicineDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ingredients', 'objects_used', 'dosage_and_usage', 'preservation', 'careful', 'medicine_id',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
