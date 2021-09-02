<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeConcern extends Model
{
     public function concern_image()
    {
        return $this->hasMany('App\HomeConcernImage');
    }
}
