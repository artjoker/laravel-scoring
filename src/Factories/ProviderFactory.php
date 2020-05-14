<?php

    namespace Artjoker\LaravelScoring\Factories;

    use Illuminate\Support\Facades\Log;

    /**
     * Class ProviderFactory
     * @package Artjoker\LaravelScoring\Factories
     */
    class ProviderFactory
    {

        /**
         * Creates a driver instance
         */
        public function getProvider($provider)
        {
            $config = config("scoring.{$provider}");
            if (isset($config) && $config['enabled'] == true) {
                return new $config['class']($config);
            } else {
                Log::error('LaravelScoring (ProviderFactory): You may have chosen an unsupported provider "' . $provider . '"');
                return false;
            }
        }
    }
