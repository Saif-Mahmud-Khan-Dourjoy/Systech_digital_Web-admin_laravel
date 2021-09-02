<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    protected $fillable= ['product_id', 'product_description_headline', 'product_description_text', 'product_description_video', 'request_for_demo_button_link', 'download_brochure_button_link'];

    public function product_description_point() {
		  return $this->hasMany('App\ProductDescriptionPoint');
  	}
}
