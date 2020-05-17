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
         * @param array $params
         *
         * @return mixed
         */
        public function scoring($service, $params = [])
        {
            $factory = new ProviderFactory();
            if ($this->provider = $factory->getProvider($service)) {
                return $this->provider->getScoring($params);
            }
            return false;
        }

        /**
         * @param       $service
         * @param array $params
         *
         * @return bool
         */
        public function status($service, $params = [])
        {
            $factory = new ProviderFactory();
            if ($this->provider = $factory->getProvider($service)) {
                return $this->provider->sendFeedback($params);
            }
            return false;
        }

        /**
         * @param       $service
         * @param array $params
         *
         * @return bool
         */
        public function ubkiReport($service, $params = [])
        {
            $factory = new ProviderFactory();
            if ($this->provider = $factory->getProvider($service)) {
                return $this->provider->getUbki($params);
            }
            return false;
        }

    }
