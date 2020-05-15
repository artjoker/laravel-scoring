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
                __DIR__ . '/../config/scoring.php' => config_path('scoring.php'),
            ], 'config');

            // Publishing is only necessary when using the CLI.
            if ($this->app->runningInConsole()) {
                $this->bootForConsole();
            }
        }

        /**
         * Register the application services.
         */
        public function register()
        {
            $this->mergeConfigFrom(__DIR__ . '/../config/scoring.php', 'scoring');

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

        /**
         * Console-specific booting.
         *
         * @return void
         */
        protected function bootForConsole()
        {
            // Publishing the configuration file.
            $this->publishes([
                __DIR__ . '/../config/scoring.php' => config_path('scoring.php'),
            ], 'config');
        }
    }

