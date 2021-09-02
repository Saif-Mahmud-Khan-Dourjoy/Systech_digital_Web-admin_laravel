<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeStatistic extends Model
{
     protected $fillable = [
        'statistic_number', 'statistic_text', 'icon'
    ];
}
