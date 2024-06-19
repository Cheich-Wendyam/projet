<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Restaurant extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class, 'resto_id');
    }
}
