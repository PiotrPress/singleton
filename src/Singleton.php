<?php declare( strict_types = 1 );

namespace PiotrPress;

final class Singleton {
    private static $instance = null;

    final private function __clone() {}
    final private function __wakeup() {}
    final private function __construct() {}

    static public function instance() {
        return null === self::$instance ? self::$instance = new Singleton() : self::$instance;
    }
}