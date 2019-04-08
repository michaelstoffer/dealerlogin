<?php

namespace App\Http\Controllers;

use App\TrainingVideo;
use Illuminate\Http\Request;

class TrainingVideoController extends Controller
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
		$videos = TrainingVideo::where("product_model_id", 1)->get();
		return view('pages.training-videos.flyer-chase', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerPursue()
	{
		$videos = TrainingVideo::where("product_model_id", 2)->get();
		return view('pages.training-videos.flyer-pursue', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function flyerExplore()
	{
		$videos = TrainingVideo::where("product_model_id", 3)->get();
		return view('pages.training-videos.flyer-explore', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lunaLite()
	{
		$videos = TrainingVideo::where("product_model_id", 5)->get();
		return view('pages.training-videos.luna-lite', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function lunaRover()
	{
		$videos = TrainingVideo::where("product_model_id", 6)->get();
		return view('pages.training-videos.luna-rover', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function luna()
	{
		$videos = TrainingVideo::where("product_model_id", 4)->get();
		return view('pages.training-videos.luna', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function sol()
	{
		$videos = TrainingVideo::where("product_model_id", 7)->get();
		return view('pages.training-videos.sol', compact('videos'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerChase()
	{
		return response()->json(TrainingVideo::where("product_model_id", 1)->get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerPursue()
	{
		return response()->json(TrainingVideo::where("product_model_id", 2)->get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiFlyerExplore()
	{
		return response()->json(TrainingVideo::where("product_model_id", 3)->get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLunaLite()
	{
		return response()->json(TrainingVideo::where("product_model_id", 5)->get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLunaRover()
	{
		return response()->json(TrainingVideo::where("product_model_id", 6)->get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiLuna()
	{
		return response()->json(TrainingVideo::where("product_model_id", 4)->get());
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function apiSol()
	{
		return response()->json(TrainingVideo::where("product_model_id", 7)->get());
	}
}
