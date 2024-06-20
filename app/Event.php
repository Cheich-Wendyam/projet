<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class, 'event_id');
    }
    
}
