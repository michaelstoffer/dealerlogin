<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $with = ['manuals', 'videos'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		//
	];

	/**
	 * Get the models for the Product.
	 */
	public function models()
	{
		return $this->belongsToMany('App\ProductModel', 'product_models_product', 'product_id', 'model_id');
	}

	/**
	 * Get the Category that belongs to the Product.
	 */
	public function category()
	{
		return $this->belongsTo('App\ProductCategory', 'product_category_id');
	}

	/**
	 * Get the manuals for the Product.
	 */
	public function manuals()
	{
		return $this->hasMany('App\TroubleShootingManual');
	}

	/**
	 * Get the manuals for the Product.
	 */
	public function videos()
	{
		return $this->hasMany('App\TroubleShootingVideo');
	}
}
