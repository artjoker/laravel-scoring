<?php
    namespace Artjoker\LaravelScoring\Interfaces;

    /**
     * Interface Provider
     */
    interface Provider
    {
        /**
         * @param array $options
         * @return array
         */
        public function getScoring(array $options = []) : array;

        /**
         * @param array $options
         * @return array
         */
        public function sendFeedback(array $options = []) : array;

        /**
         * @param array $options
         * @return array
         */
        public function getUbki(array $options = []) : array;

    }
