<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBanner extends Model
{
    protected $fillable= ['product_id', 'background_image', 'product_icon', 'banner_headline', 'banner_text', 'button1_text', 'button1_link', 'button2_text', 'button2_link'];
}
