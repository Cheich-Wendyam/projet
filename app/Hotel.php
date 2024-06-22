<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Hotel extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class, 'hotel_id');
    }
}
