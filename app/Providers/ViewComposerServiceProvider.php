<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeAdminProductsForm();
        $this->composeProductsForm();
        $this->composeUserForm();
        $this->composerRoleForm();
        $this->composeAdminLessonForm();
        $this->composeLessonForm();

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

    public function composeAdminProductsForm()
    {
        view()->composer('admin.products.fields', function ($view) {
            $view->with('categories', \App\Models\Category::lists('name', 'id'))
                ->with('tags', \App\Models\Tag::lists('name', 'id'))
                ->with('files', \App\Fileentry::lists('original_filename', 'id'));
        });
    }

    public function composeProductsForm()
    {
        view()->composer('site.products.fields', function ($view) {
            $view->with('categories', \App\Models\Category::lists('name', 'id'))
                 ->with('tags', \App\Models\Tag::lists('name', 'id'))
                 ->with('files', \App\Fileentry::lists('original_filename', 'id'));
        });
    }

    private function composeUserForm()
    {
        view()->composer('admin.users.fields', function ($view) {
            $view->with('roles', \App\Models\Role::lists('name', 'id'));
        });
    }

    private function composerRoleForm()
    {
        view()->composer('admin.roles.fields', function ($view) {
            $view->with('permissions', \App\Models\Permission::lists('name', 'id'));
        });
    }

    /**
     *
     */
    private function composeAdminLessonForm()
    {
        view()->composer('admin.lessons.fields', function ($view) {
            $view->with('products', \App\Models\Product::lists('name', 'id'))
                ->with('links', \App\Models\Link::lists('name', 'id'));
        });
    }

    private function composeLessonForm()
    {
        view()->composer('site.lessons.fields', function ($view) {
            $view->with('products', \App\Models\Product::lists('name', 'id'))
                 ->with('links', \App\Models\Link::lists('name', 'id'));
        });
    }


}
