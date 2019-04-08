<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
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
	 * Get the products for the Vendor.
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}

	/**
	 * Get the Warranty Contacts for the Vendor.
	 */
	public function warrantyContacts()
	{
		return $this->hasMany('App\WarrantyContact');
	}
}
