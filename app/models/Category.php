<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable = array('name', 'parent_id', 'description','shop_id');
    protected $table = 'categories';
    protected $dates = ['deleted_at'];

    public function shops()
    {
        return $this->belongsTo('Shop', 'shop_id');
    }
}
