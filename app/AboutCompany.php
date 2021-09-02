<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
    public function company_sub_section()
    {
        return $this->hasMany('App\CompanySubSection');
    }

     public function company_head()
    {
        return $this->hasOne('App\CompanyHead');
    }
}
