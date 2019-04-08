<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarketingController extends Controller
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
		$logo_thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/logos/thumbs')));
		$brochure_thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/brochures/thumbs')));

		$sol_sm_thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/silver-mine')));
		$sol_eb_thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/electric-blue')));
		$sol_gd_thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/gold-dust')));
		$sol_int_thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/interior')));

		return view('pages.marketing', compact('logo_thumbs', 'brochure_thumbs', 'sol_sm_thumbs', 'sol_eb_thumbs', 'sol_gd_thumbs', 'sol_int_thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function logos()
	{
		$thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/logos/thumbs')));
		return view('pages.marketing-materials.logos', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function brochures()
	{
		$thumbs = json_encode(str_replace('public', 'storage', Storage::files('public/marketing/intechrv/brochures/thumbs')));
		return view('pages.marketing-materials.brochures', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerChase()
	{
		$silver_moon = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/flyer/chase/thumbs/silver-moon'));

		$thumbs = json_encode(['silver-moon' => $silver_moon]);
		return view('pages.marketing-materials.flyer-chase', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerPursue()
	{
		$silver_moon = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/flyer/pursue/thumbs/silver-moon'));

		$thumbs = json_encode(['silver-moon' => $silver_moon]);
		return view('pages.marketing-materials.flyer-pursue', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerExplore()
	{
		$artic_white = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/flyer/explore/thumbs/arctic-white'));

		$thumbs = json_encode(['arctic-white' => $artic_white]);
		return view('pages.marketing-materials.flyer-explore', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lunaLite()
	{
		$asteroid_silver = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-lite/thumbs/asteroid-silver'));
		$space_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-lite/thumbs/space-blue'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-lite/thumbs/interior'));

		$thumbs = json_encode(['asteroid-silver' => $asteroid_silver, 'space-blue' => $space_blue, 'interior' => $interior]);
		return view('pages.marketing-materials.luna-lite', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lunaRover()
	{
		$rocket_red = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-rover/thumbs/rocket-red'));
		$asteroid_silver = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-rover/thumbs/asteroid-silver'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-rover/thumbs/interior'));

		$thumbs = json_encode(['rocket-red' => $rocket_red, 'asteroid-silver' => $asteroid_silver, 'interior' => $interior]);
		return view('pages.marketing-materials.luna-rover', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function luna()
	{
		$silver_mine = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/silver-mine'));
		$sunburst_orange = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/sunburst-orange'));
		$electric_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/electric-blue'));
		$mediterranean_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/mediterranean-blue'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/interior'));


		$thumbs = json_encode(['silver-mine' => $silver_mine, 'sunburst-orange' => $sunburst_orange, 'electric-blue' => $electric_blue, 'mediterranean-blue' => $mediterranean_blue, 'interior' => $interior]);
		return view('pages.marketing-materials.luna', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function sol()
	{
		$silver_mine = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/silver-mine'));
		$electric_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/electric-blue'));
		$gold_dust = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/gold-dust'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/interior'));

		$thumbs = json_encode(['silver-mine' => $silver_mine, 'electric-blue' => $electric_blue, 'gold-dust' => $gold_dust, 'interior' => $interior]);
		return view('pages.marketing-materials.sol', compact('thumbs'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLogos()
	{
		$thumbs = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/logos/thumbs'));
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiBrochures()
	{
		$thumbs = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/brochures/thumbs'));
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerChase()
	{
		$silver_moon = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/flyer/chase/thumbs/silver-moon'));

		$thumbs = ['silver-moon' => $silver_moon];
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerPursue()
	{
		$silver_moon = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/flyer/pursue/thumbs/silver-moon'));

		$thumbs = ['silver-moon' => $silver_moon];
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerExplore()
	{
		$artic_white = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/flyer/explore/thumbs/arctic-white'));

		$thumbs = ['arctic-white' => $artic_white];
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLunaLite()
	{
		$asteroid_silver = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-lite/thumbs/asteroid-silver'));
		$space_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-lite/thumbs/space-blue'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-lite/thumbs/interior'));

		$thumbs = ['asteroid-silver' => $asteroid_silver, 'space-blue' => $space_blue, 'interior' => $interior];
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLunaRover()
	{
		$rocket_red = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-rover/thumbs/rocket-red'));
		$asteroid_silver = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-rover/thumbs/asteroid-silver'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna-rover/thumbs/interior'));

		$thumbs = ['rocket-red' => $rocket_red, 'asteroid-silver' => $asteroid_silver, 'interior' => $interior];
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLuna()
	{
		$silver_mine = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/silver-mine'));
		$sunburst_orange = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/sunburst-orange'));
		$electric_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/electric-blue'));
		$mediterranean_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/mediterranean-blue'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/luna/luna/thumbs/interior'));

		$thumbs = ['silver-mine' => $silver_mine, 'sunburst-orange' => $sunburst_orange, 'electric-blue' => $electric_blue, 'mediterranean-blue' => $mediterranean_blue, 'interior' => $interior];
		return response()->json($thumbs);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiSol()
	{
		$silver_mine = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/silver-mine'));
		$electric_blue = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/electric-blue'));
		$gold_dust = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/gold-dust'));
		$interior = str_replace('public', 'storage', Storage::files('public/marketing/intechrv/models/sol/thumbs/interior'));

		$thumbs = ['silver-mine' => $silver_mine, 'electric-blue' => $electric_blue, 'gold-dust' => $gold_dust, 'interior' => $interior];
		return response()->json($thumbs);
	}
}
