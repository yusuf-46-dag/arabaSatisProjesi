<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use SoftDeletes;

    protected $table = 'car_brands';

    public function getModels(){
        return $this->hasMany(CarModel::class, 'brand_id', 'id');
    }
}
