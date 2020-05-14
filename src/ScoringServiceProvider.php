<?php

    namespace Artjoker\LaravelScoring;

    use Illuminate\Support\ServiceProvider;

    /**
     * Class ScoringServiceProvider
     * @package Artjoker\LaravelScoring
     */
    class ScoringServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap the application services.
         */
        public function boot()
        {
            $this->publishes([
                __DIR__ . '/../config/scoring.php' => config_path('scoring.php')
            ], 'config');
        }

        /**
         * Register the application services.
         */
        public function register()
        {
            // Register the service the package provides.
            $this->app->singleton('laravelScoring', function ($app) {
                return new Scoring;
            });
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides()
        {
            return ['laravelScoring'];
        }
    }

