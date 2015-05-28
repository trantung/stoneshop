<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent {
    protected $table = 'products';

    public function categories()
    {
        return $this->belongsTo('Category', 'category_id');
    }
}
