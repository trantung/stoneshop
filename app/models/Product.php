<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends Eloquent {
	use SoftDeletingTrait;
    protected $table = 'products';
	protected $fillable = array('name', 'category_id', 'description','price', 'image_url', 'total_rate', 'quantity_rate', 'average_rate');

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }
}
