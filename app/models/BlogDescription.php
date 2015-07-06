<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class BlogDescription extends Eloquent {
    protected $table = 'blog_descriptions';
    use SoftDeletingTrait;
	protected $fillable = array('title', 'user_id', 'description','image_url');
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
