<?php

namespace App\Http\Controllers;

use App\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
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
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Dealer  $dealer
	 * @return \Illuminate\Http\Response
	 */
	public function show(Dealer $dealer)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Dealer  $dealer
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Dealer $dealer)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Dealer  $dealer
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Dealer $dealer)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Dealer  $dealer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Dealer $dealer)
	{
		//
	}

	public function updateAll()
	{
		$filename= 'https://www.intechtrailers.com/MR/MfgRefInfo/RefInfo.XML';
		$file_headers = @get_headers($filename);
		if ($file_headers[0] == 'HTTP/1.1 200 OK') {
			$xml = simplexml_load_file($filename, 'SimpleXMLElement', LIBXML_NOCDATA);
			$dealers = $xml->Dealer;
			for ($i = 0; $i < count($dealers); $i++) {
				$dealer_id = $dealers[$i]->attributes()['dealerid'];
				$dealer_name = $dealers[$i]->attributes()['dealername'];

				$new_dealer = \App\Dealer::firstOrCreate(
					['id' => $dealer_id],
					['name' => $dealer_name]
				);
			}
		}

		return back()->with('flash', 'All Dealers have been updated!');
	}
}
