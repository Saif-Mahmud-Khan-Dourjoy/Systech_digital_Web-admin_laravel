<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClientImage extends Model
{
    protected $fillable= ['product_id', 'client_company_logo', 'client_link'];
}
