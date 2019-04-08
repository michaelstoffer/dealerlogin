<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingVideo extends Model
{
	use SoftDeletes;

	// protected $with = ['model'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'heading', 'video', 'video_name', 'video_size', 'video_code', 'embed',
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
	public function model()
	{
		return $this->belongsTo('App\ProductModel', 'product_model_id');
	}
}
