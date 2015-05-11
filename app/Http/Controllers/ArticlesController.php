<?php namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ArticlesController extends Controller {


	/**
	 * show all articles
	 */
	public function index()
	{
		// $articles = \App\Article::all();
		$articles = \App\Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));
	}

	/**
	 * show article based on selection
	 */
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

	/**
	 * create new article
	 */
	public function create()
	{
		return view('articles.create');
	}


	/**
	 * save new articles
	 * @param  CreateArticleRequest $request [request validation before save]
	 * @return Response                      
	 */

    /*public function store(CreateArticleRequest $request)
	{
		// $input = Request::all();
		// // $input = Request::get('body');
		
		// $input['published_at'] = Carbon::now();
		// // $article = new Article;
		// // $article->title = $input['title'];
		Article::create($request->all());


		return redirect('articles');
	}*/

    /**
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        //$this->validate($request, ['title' => 'required', 'body' => 'required']);
        Article::create($request->all());

        return redirect('articles');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $article = Article::findorFail($id);

        return view('articles.edit', compact('article'));
    }

    /*
     * update article
     * */
    public function update($id, ArticleRequest $request)
    {
        $article = Article::findorFail($id);
        $article->update($request->all());

        return redirect('articles');


    }

}
