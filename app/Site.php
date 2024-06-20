<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Site extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class, 'site_id');
    }
}

