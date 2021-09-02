<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBuy extends Model
{
    protected $fillable= ['product_id', 'sell_headline', 'sell_text', 'sell_button_text'];
}
