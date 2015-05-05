<?php namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;

class ArticlesController extends Controller {

	public function index()
	{
		// $articles = \App\Article::all();
		$articles = \App\Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	public function show($id)
	{
		$article = Article::findOrFail($id);

		// if (is_null($article)) {
		// 	abort(404);
		// }
		
		//dd($article->created_at->year);
		//dd($article->created_at->addDays(8)->diffForHumans());


		return view('articles.show', compact('article'));

	}


	public function create()
	{
		return view('articles.create');
	}
	
	public function store()
	{
		// $input = Request::all();
		// // $input = Request::get('body');
		
		// $input['published_at'] = Carbon::now();
		// // $article = new Article;
		// // $article->title = $input['title'];
		Article::create(Request::all());


		return redirect('articles');
	}
	
}
