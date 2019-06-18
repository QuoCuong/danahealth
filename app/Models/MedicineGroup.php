<?php

namespace App;

use App\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class MedicineGroup extends Model
{
    use Sluggable, SoftDeletes;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [
        'name', 'parent_id',
    ];

    public function parent()
    {
        return $this->hasOne(MedicineGroup::class, 'id');
    }

    public function children()
    {
        return $this->hasMany(MedicineGroup::class, 'parent_id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function childMedicines()
    {
        return $this->hasManyThrough(Medicine::class, self::class, 'parent_id', 'medicine_group_id', 'id');
    }

}
