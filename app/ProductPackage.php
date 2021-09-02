<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    protected $fillable= ['product_id', 'package_name', 'package_status'];
    
    public function product_package_point() {
		  return $this->hasMany('App\ProductPackagePoint');
	  }
}
