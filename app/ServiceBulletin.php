<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceBulletin extends Model
{
	use SoftDeletes;

	protected $with = ['line', 'models'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'range', 'pdf', 'pdf_name', 'pdf_size'
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
	 * Get the products for the Model.
	 */
	public function models()
	{
		return $this->belongsToMany('App\ProductModel', 'product_models_service_bulletins', 'bulletin_id', 'model_id');
	}
}
