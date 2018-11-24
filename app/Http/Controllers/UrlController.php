<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{

	public function showForm()
	{
		return view('form');
	}

	/*
	 * @string string of shortened url
	 * increments requests
	 * @return redirect
	 */
	public function getRedirectUrl($string)
	{

	}

	/*
 	* @string string of url
	 * returns view with generated string
 	*/
	public function createUrl(Request $request)
	{

	}


	/*
 	* @string string of url
 	*returns view with stats of url
	 */
	public function getStats($string)
	{

	}
}
