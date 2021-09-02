<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOurStrength extends Model
{
    protected $fillable= ['product_id', 'strength_headline', 'strength_text'];

    public function product_strength() {
		  return $this->hasMany('App\ProductStrength');
	  }
}
