<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatistic extends Model
{
    protected $fillable= ['product_id', 'statistic_icon', 'statistic_number', 'statistic_text'];
}
