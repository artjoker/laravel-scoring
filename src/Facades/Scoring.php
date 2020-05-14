<?php

    namespace Artjoker\LaravelScoring\Facades;

    use Illuminate\Support\Facades\Facade;

    /**
     * Class Scoring
     * @package Artjoker\LaravelScoring\Facades
     */
    class Scoring extends Facade
    {
        /**
         * Get the registered name of the component.
         *
         * @return string
         */
        protected static function getFacadeAccessor(): string
        {
            return 'laravelScoring';
        }
    }
