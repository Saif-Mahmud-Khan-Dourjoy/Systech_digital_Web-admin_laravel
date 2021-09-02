<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStrength extends Model
{
    protected $fillable= ['product_our_strength_id', 'strength_icon', 'strength_headtext', 'strength_subtext'];

    public function product_our_strength() {
        return $this->belongsTo('App\ProductOurStrength');
    }
}
