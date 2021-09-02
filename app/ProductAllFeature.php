<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAllFeature extends Model
{
    protected $fillable= ['product_id', 'feature_headline'];

    public function product_feature() {
		return $this->hasMany('App\ProductFeature');
	}
    
    public function product_image() {
		return $this->hasMany('App\ProductImage');
	}
}
