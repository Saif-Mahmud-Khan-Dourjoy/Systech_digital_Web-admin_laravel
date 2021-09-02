<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTestimonial extends Model
{
    protected $fillable= ['product_id', 'client_image', 'client_comment', 'client_name', 'client_designation'];
}
