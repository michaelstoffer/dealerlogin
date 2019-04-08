<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
	use SoftDeletes;

	protected $with = ['products'];

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
	 * Get the products for the Category.
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}

	/**
	 * Get the categories for the Model.
	 */
	public function models()
	{
		return $this->belongsToMany('App\ProductModel', 'product_models_product_categories', 'category_id', 'model_id');
	}
}
