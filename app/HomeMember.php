<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeMember extends Model
{
    public function member_image()
    {
        return $this->hasMany('App\HomeMemberImage');
    }
}
