<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable= ['product_all_feature_id', 'product_photo'];
    public function product_all_feature() {
      return $this->belongsTo('App\ProductAllFeature');
    }
}
