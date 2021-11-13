<?php declare( strict_types = 1 );

namespace PiotrPress;

trait Singleton {
    final private function __clone() {}
    final private function __wakeup() {}

    protected function __construct() {}

    static public function instance() {
        static $instance = null;

        if ( $instance ) return $instance;

        $reflection = new \ReflectionClass( static::class );

        $instance = $reflection->newInstanceWithoutConstructor();

        $constructor = $reflection->getConstructor();
        $constructor->setAccessible( true );
        $constructor->invokeArgs( $instance, \func_get_args() );

        return $instance;
    }
}