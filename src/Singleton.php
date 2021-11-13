<?php declare( strict_types = 1 );

namespace PiotrPress;

trait Singleton {
    final private function __clone() {}
    final private function __wakeup() {}

    protected function __construct() {}

    static public function instance() {
        static $instance = null;

        if ( $instance ) return $instance;

        $args = \func_get_args();
        $params = [];
        for ( $num = 0; $num < \func_num_args(); $num ++ )
            $params[] = \sprintf( '$args[%s]', $num );

        eval( \sprintf( '$instance = new static( %s );', \implode( ', ', $params ) ) );

        return $instance;
    }
}