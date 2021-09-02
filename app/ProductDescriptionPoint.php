<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescriptionPoint extends Model
{
    protected $fillable= ['product_description_id', 'point'];
    public function product_description() {
        return $this->belongsTo('App\ProductDescription');
    }
}
