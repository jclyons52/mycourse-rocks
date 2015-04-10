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
        $this->composeProductsForm();
        $this->composeUserForm();
        $this->composerRoleForm();

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

    public function composeProductsForm()
    {
        view()->composer('admin.products.fields', function ($view) {
            $view->with('categories', \App\Models\Category::lists('name', 'id'))
                 ->with('tags', \App\Models\Tag::lists('name', 'id'));
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

}
