<?php namespace CMS\Providers;

use Illuminate\Support\ServiceProvider;

/**
* Repository Service Provider
*/
class RepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'CMS\Repositories\PostRepositoryInterface',
            function($app, $parameters) {
                return new \CMS\Repositories\EloquentPostRepository($parameters);
            }
        );

        $this->app->bind(
            'CMS\Repositories\TagRepositoryInterface',
            function($app, $parameters) {
                return new \CMS\Repositories\EloquentTagRepository($parameters);
            }
        );

        $this->app->bind(
            'CMS\Repositories\UserRepositoryInterface',
            function($app, $parameters) {
                return new \CMS\Repositories\EloquentUserRepository($parameters);
            }
        );

        $this->app->bind(
            'CMS\Repositories\MediaRepositoryInterface',
            function($app, $parameters) {
                return new \CMS\Repositories\EloquentMediaRepository($parameters);
            }
        );

        $this->app->bind(
            'CMS\Repositories\ContactRepositoryInterface',
            function($app, $parameters) {
                return new \CMS\Repositories\ContactRepository($parameters);
            }
        );
    }
}
