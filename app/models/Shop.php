<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Shop extends Eloquent {
    protected $table = 'shops';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
