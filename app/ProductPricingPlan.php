<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPricingPlan extends Model
{
    protected $fillable= ['product_id', 'custom_package_button_link', 'contact_for_price_button_link', 'regular_select', 'standard_select', 'business_select'];
}
