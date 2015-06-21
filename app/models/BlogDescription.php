<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class BlogDescription extends Eloquent {
    protected $table = 'blog_descriptions';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
