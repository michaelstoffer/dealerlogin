<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TroubleShootingManual extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'pdf', 'pdf_name', 'pdf_size', 'pdf_image'
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
