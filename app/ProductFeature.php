<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable= ['product_all_feature_id', 'feature_icon', 'feature_headtext', 'feature_subtext'];
    
    public function product_all_feature() {
        return $this->belongsTo('App\ProductAllFeature');
    }
}
