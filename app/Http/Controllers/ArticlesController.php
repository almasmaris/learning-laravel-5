<?php namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\Tag;


class ArticlesController extends Controller {

    public function __construct()
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
        $tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
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

//        $article = new Article($request->all());

        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));


//      session()->flash('flash_message', 'Your article has been created!');
//      session()->flash('flash_message_important', true);

//        flash()->success('Your article has been created!');
        flash()->overlay('Your articles has been successfully created!', 'Good Job');

        return redirect('articles');
    }


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {

//        $article = Article::findorFail($id);

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
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
