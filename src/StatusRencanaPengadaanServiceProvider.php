<?php namespace Bantenprov\StatusRencanaPengadaan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\StatusRencanaPengadaan\Console\Commands\StatusRencanaPengadaanCommand;

/**
 * The StatusRencanaPengadaanServiceProvider class
 *
 * @package Bantenprov\StatusRencanaPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusRencanaPengadaanServiceProvider extends ServiceProvider
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
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('status-rencana-pengadaan', function ($app) {
            return new StatusRencanaPengadaan;
        });

        $this->app->singleton('command.status-rencana-pengadaan', function ($app) {
            return new StatusRencanaPengadaanCommand;
        });

        $this->commands('command.status-rencana-pengadaan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'status-rencana-pengadaan',
            'command.status-rencana-pengadaan',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('status-rencana-pengadaan.php');

        $this->mergeConfigFrom($packageConfigPath, 'status-rencana-pengadaan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'status-rencana-pengadaan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/status-rencana-pengadaan'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'status-rencana-pengadaan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/status-rencana-pengadaan'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'status-rencana-pengadaan-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'status-rencana-pengadaan-public');
    }
}
