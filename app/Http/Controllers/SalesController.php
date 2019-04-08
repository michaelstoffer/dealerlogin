<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SalesController extends Controller
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
	public function flyerChase()
	{
		return view('pages.sales-tools.flyer-chase');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerPursue()
	{
		return view('pages.sales-tools.flyer-pursue');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerExplore()
	{
		return view('pages.sales-tools.flyer-explore');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lunaLite()
	{
		return view('pages.sales-tools.luna-lite');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lunaRover()
	{
		return view('pages.sales-tools.luna-rover');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function luna()
	{
		return view('pages.sales-tools.luna');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function sol()
	{
		return view('pages.sales-tools.sol');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerChase()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/flyer/chase/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/flyer/chase/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerPursue()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/flyer/pursue/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/flyer/pursue/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerExplore()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/flyer/explore/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/flyer/explore/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLunaLite()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/luna/luna-lite/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/luna/luna-lite/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLunaRover()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/luna/luna-rover/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/luna/luna-rover/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLuna()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/luna/luna/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/luna/luna/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiSol()
	{
		$dealer_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/dealer-pricing/models/sol/sol/thumbs'));
		$msrp_pricing_2019 = str_replace('public', 'storage', Storage::files('public/sales-tools/intechrv/2019/msrp-pricing/models/sol/sol/thumbs'));
		return response()->json(['dealer2019' => $dealer_pricing_2019, 'msrp2019' => $msrp_pricing_2019]);
	}
}
