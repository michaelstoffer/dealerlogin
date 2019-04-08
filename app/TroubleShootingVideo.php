<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleShootingVideo extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'video', 'video_name', 'video_size', 'video_code', 'embed',
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
	 * Get the Product belongs to the Trouble Shooting Manual.
	 */
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
