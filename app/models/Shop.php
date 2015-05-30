<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Shop extends Eloquent {
    protected $table = 'shops';
    use SoftDeletingTrait;
    protected $fillable = array('user_id', 'name', 'description','address', 'tel', 'mobile', 'image_url', 'lat', 'long');
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
}
