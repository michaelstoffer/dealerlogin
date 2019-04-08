<?php

namespace App\Http\Controllers;

use App\Warranty;
use App\ProductModel;
use App\InstallGuide;
use App\ProductCategory;
use App\ServiceBulletin;
use App\WarrantyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function warranty()
	{
		return view('pages.service.warranty');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function serviceBulletins()
	{
		return view('pages.service.service-bulletins');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function installGuides()
	{
		return view('pages.service.install-guides');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function careAndMaintenance()
	{
		return view('pages.service.care-and-maintenance');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function warrantyContacts()
	{
		return view('pages.service.warranty-contacts');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function troubleShootingAndManuals()
	{
		return view('pages.service.trouble-shooting-and-manuals');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiWarranty()
	{
		return response()->json(Warranty::select('title','body','contact_name','contact_phone','contact_email')->orderBy('id', 'desc')->first());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiServiceBulletins()
	{
		return response()->json(ServiceBulletin::all());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiInstallGuides()
	{
		return response()->json(InstallGuide::all());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiCareAndMaintenance()
	{
		return response()->json(str_replace('public', 'storage', Storage::files('public/service/intechrv/care-maintenance/thumbs')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiWarrantyContacts()
	{
		return response()->json(WarrantyContact::all());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiTroubleShootingAndManuals()
	{
		$models = ProductModel::with('categories:category_id')->get();
		$categories = ProductCategory::with('models:model_id')->get();

		return response()->json(["models" => $models, "categories" => $categories]);
	}
}
