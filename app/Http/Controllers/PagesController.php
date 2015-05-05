<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
	public function about(){

		$first = 'fox';
		return view('pages.about', compact('first'));
	}

	public function contact()
	{
		return view('pages.contact');
	}
}
