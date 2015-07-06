<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Image extends Eloquent {
	use SoftDeletingTrait;
    protected $table = 'images';
	protected $fillable = array('type', 'description','image_url', 'status');
    protected $dates = ['deleted_at'];

    public static function getCommonImage($type)
    {
    	$images = self::where('type', $type)->where('status', IMAGE_STATUS)->get()->toArray();
    	if(empty($images)){
    		return null ;
    	}
    	return $images[0]['image_url'];
    }

}
