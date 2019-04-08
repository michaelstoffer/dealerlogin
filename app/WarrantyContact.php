<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarrantyContact extends Model
{
	use SoftDeletes;

	protected $with = ['vendor'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'phone', 'customer_service_phone', 'technical_support_phone', 'warranty_phone', 'customer_service_email', 'technical_support_email', 'warranty_email', 'website', 'pdf1', 'pdf1_name', 'pdf1_size',
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
     * Get the Vendor belongs to the Warranty Contact.
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
}
