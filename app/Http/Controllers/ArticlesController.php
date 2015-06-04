<?php namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller {

    public function __contruct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


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
     * @param Article $article
     * @return \Illuminate\View\View
     */
	public function show(Article $article)
	{


//		$article = Article::findOrFail($id);

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
     * save new user's article
     *
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        //$this->validate($request, ['title' => 'required', 'body' => 'required']);
       //Article::create($request->all());

        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

        return redirect('articles');
    }


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {

//        $article = Article::findorFail($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {
//        $article = Article::findorFail($id);
        $article->update($request->all());

        return redirect('articles');


    }

}
