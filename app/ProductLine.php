<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLine extends Model
{
	use SoftDeletes;

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
	 * Get the models for the Line.
	 */
	public function bulletins()
	{
		return $this->hasMany('App\ServiceBulletin', 'line_id');
	}

	/**
	 * Get the models for the Line.
	 */
	public function models()
	{
		return $this->hasMany('App\ProductModel', 'line_id');
	}
}
