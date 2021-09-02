<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= ['product_name', 'product_code', 'description', 'product_image', 'status'];

    public function product_banner() {
		return $this->hasOne('App\ProductBanner');
	}

    public function product_description() {
		return $this->hasOne('App\ProductDescription');
	}

    public function product_statistic() {
		return $this->hasMany('App\ProductStatistic');
	}
    public function product_all_feature() {
		return $this->hasOne('App\ProductAllFeature');
	}
    public function product_our_strength() {
		return $this->hasOne('App\ProductOurStrength');
	}
    public function product_pricing_plan() {
		return $this->hasOne('App\ProductPricingPlan');
	}

    public function product_testimonial() {
		return $this->hasMany('App\ProductTestimonial');
	}
    public function product_client() {
		return $this->hasOne('App\ProductClient');
	}
	public function product_client_image() {
		return $this->hasMany('App\ProductClientImage');
	}

    public function product_buy() {
		return $this->hasOne('App\ProductBuy');
	}
	public function product_package() {
		return $this->hasMany('App\ProductPackage');
	}

}
