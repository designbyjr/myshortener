<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
		//check string against db
		$validator = Validator::make(['shorturl'=>$string],['shorturl'=>'exists:urls,shorturl']);
		if ($validator->fails()) {
			return redirect('/notvalid')
				->withErrors($validator)
				->withInput();
		}
		$url = DB::table('urls')
			->whereColumn('shorturl',$string)
			->select(['url','id'])
			->first(['url','id']);


		//get  stats
		$data = DB::table('stats')->where('urls_id', $url->id)
					->get(['statcount']);

		//insert stats if it does not exist
		if(count($data) == 0)
		{	$count = 0;

			DB::table('stats')
				->insert(['urls_id'=>$url->id,
						  'statcount'=>$count,
						  'created_at' => now(),
						  'updated_at'=>now()
						 ]);

		}
		//update stats
		$count = $data->sum('statcount') +1;

		DB::table('stats')->where('urls_id', $url->id)
			->update(['statcount'=>$count,'updated_at'=>now()]);
		//redirect to url
		return redirect()->to($url->url);
	}

	/*
 	* @string string of url
	 * returns view with generated string
 	*/
	public function createUrl(Request $request)
	{
		$request->validate([
			'url'=>'required|unique:urls,url'
		]);
		$url = $request['url'];
		$id = DB::table('urls')->insertGetId(
			['url'=>$url,
			 'created_at'=>now()
				]
		);
		$code = base64_encode($id);
		DB::table('urls')->where('id', $id)->update(['shorturl'=>$code,'updated_at'=>now()]);
		return view('form',['newurl'=>'localhost:8000/'.$code]);
	}


	/*
 	* @string string of url
 	*returns view with stats of url
	 */
	public function getStats($string)
	{
		$validator = Validator::make(['shorturl'=>$string],['shorturl'=>'exists:urls,shorturl']);
		if ($validator->fails()) {
			return redirect('/form')
				->withErrors($validator)
				->withInput();
		}
		$id = DB::table('urls')
			->whereColumn('shorturl',$string)
			->select(['id'])
			->first(['id']);

		$count = DB::table('stats')
			->whereColumn('urls_id',$id->id)
			->select(['statcount','updated_at'])
			->first(['statcount','updated_at']);
		//return stats
		return view('stats',['items'=>['name'=>[$count->updated_at],'value'=>[$count->statcount]],
							 'page_name'=>'stats',
							 'url' => 'localhost:8000/'.$string
		]);
	}
}
