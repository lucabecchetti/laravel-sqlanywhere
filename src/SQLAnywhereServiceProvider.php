<?php

namespace Brokenice\LaravelSqlAnywhere;

use Brokenice\LaravelSqlAnywhere\SQLAnywhere\SQLAnywhereConnection;
use Brokenice\LaravelSqlAnywhere\SQLAnywhere\SQLAnywhereConnector;
use Illuminate\Database\DatabaseServiceProvider;

/**
 * Class DatabaseServiceProvider.
 */
class SQLAnywhereServiceProvider extends DatabaseServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $factory = $this->app['db'];
        $factory->extend('sqlanywhere',function($config) {
            if ( ! isset($config['prefix']))
            {
                $config['prefix'] = '';
            }

            $connector =  new SQLAnywhereConnector();
            $pdo = $connector->connect($config);
            return new SQLAnywhereConnection($pdo, $config['database'], $config['prefix']);

        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
