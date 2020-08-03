<?php

namespace App;
use App\Menu;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function restaurantMenu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
