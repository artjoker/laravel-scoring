<?php

    namespace Artjoker\LaravelScoring;

    use Artjoker\LaravelScoring\Factories\ProviderFactory;
    use Illuminate\Support\Facades\Config;
    use Artjoker\LaravelScoring\Interfaces\Provider;

    /**
     * Class Scoring
     * @package Artjoker\LaravelScoring
     */
    class Scoring
    {
        protected $provider;
        protected $config;

        /**
         * Scoring constructor.
         *
         * @param Provider|null $provider
         */
        public function __construct(Provider $provider = null)
        {
            $this->config   = (class_exists("Config") ? Config::get('scoring') : []);
            $this->provider = $provider;
        }

        /**
         * @param       $service
         * @param array $options
         *
         * @return mixed
         */
        public function scoring($service, $options = [])
        {
            $factory = new ProviderFactory();
            if ($this->provider = $factory->getProvider($service)) {
                return $this->provider->getScoring($options);
            }
            return false;
        }

        /**
         * @param       $service
         * @param array $options
         *
         * @return bool
         */
        public function status($service, $options = [])
        {
            $factory = new ProviderFactory();
            if ($this->provider = $factory->getProvider($service)) {
                return $this->provider->sendFeedback($options);
            }
            return false;
        }

        /**
         * @param       $service
         * @param array $options
         *
         * @return bool
         */
        public function ubkiReport($service, $options = [])
        {
            $factory = new ProviderFactory();
            if ($this->provider = $factory->getProvider($service)) {
                return $this->provider->getUbki($options);
            }
            return false;
        }

    }
