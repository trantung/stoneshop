<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Blog extends Eloquent {
    protected $table = 'blogs';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
