<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent {
	use SoftDeletingTrait;
    protected $table = 'categories';
	protected $fillable = array('name', 'parent_id', 'description','shop_id');
    protected $dates = ['deleted_at'];

    public function shops()
    {
        return $this->belongsTo('Shop', 'shop_id');
    }
    public static function getParentCategory()
    {
    	return self::where('parent_id',0)->get();
    }
}
