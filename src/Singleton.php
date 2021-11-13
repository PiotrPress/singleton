<?php declare( strict_types = 1 );

namespace PiotrPress;

abstract class Singleton {
    final private function __clone() {}
    final private function __wakeup() {}

    protected function __construct() {}

    static public function instance() {
        static $instance = null;
        return null === $instance ? $instance = new static() : $instance;
    }
}