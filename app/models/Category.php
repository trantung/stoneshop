<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Category extends Eloquent {
    protected $table = 'categories';

    public function shops()
    {
        return $this->belongsTo('Shop', 'shop_id');
    }
}
