<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
	use SoftDeletes;

	protected $with = ['products', 'videos'];

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
	 * Get the Line that belongs to the Model.
	 */
	public function line()
	{
		return $this->belongsTo('App\ProductLine', 'line_id');
	}

	/**
	 * Get the videos for the Model.
	 */
	public function videos()
	{
		return $this->hasMany('App\TrainingVideo', 'product_model_id');
	}

	/**
	 * Get the categories for the Model.
	 */
	public function products()
	{
		return $this->belongsToMany('App\Product', 'product_models_product', 'model_id', 'product_id');
	}

	/**
	 * Get the Service Bulletins that belongs to the Product Model.
	 */
	public function categories()
	{
		return $this->belongsToMany('App\ProductCategory', 'product_models_product_categories', 'model_id', 'category_id');
	}

	/**
	 * Get the Service Bulletins that belongs to the Product Model.
	 */
	public function bulletins()
	{
		return $this->belongsToMany('App\ServiceBulletin', 'product_models_service_bulletins', 'model_id', 'bulletin_id');
	}

	/**
	 * Get the Service Bulletins that belongs to the Product Model.
	 */
	public function guides()
	{
		return $this->belongsToMany('App\InstallGuide', 'product_models_install_guides', 'model_id', 'guide_id');
	}
}
