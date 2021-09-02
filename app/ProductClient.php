<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClient extends Model
{
    protected $fillable= ['product_id', 'client_headline'];

    public function product_client_image() {
		return $this->hasMany('App\ProductClientImage');
	}
}
