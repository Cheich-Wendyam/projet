<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Espace extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class, 'space_id');
    }
}
    

