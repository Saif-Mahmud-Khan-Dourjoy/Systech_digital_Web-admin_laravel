<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPackagePoint extends Model
{
    protected $fillable= ['product_package_id', 'package_point'];

    public function product_package() {
        return $this->belongsTo('App\ProductPackage');
    }
}
