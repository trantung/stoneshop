<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Image extends Eloquent {
	use SoftDeletingTrait;
    protected $table = 'images';
	protected $fillable = array('type', 'description','image_url', 'status');
    protected $dates = ['deleted_at'];

}
