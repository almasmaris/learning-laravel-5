<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->ComposeNavigation();
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}


    /**
     * Compose the navigation bar
     */
    private function ComposeNavigation()
    {

//      view()->composer('partials.navbar', 'App\Http\Composers\NavigationComposer');

        view()->composer('partials.navbar', function ($view) {
            $view->with('latest', Article::latest()->first());
        });
    }

}
