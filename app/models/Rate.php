<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Rate extends Eloquent {
    protected $table = 'rates';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
