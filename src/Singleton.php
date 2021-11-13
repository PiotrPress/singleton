<?php declare( strict_types = 1 );

namespace PiotrPress;

trait Singleton {
    public function __serialize() : array  {
        throw new \Exception( 'Cannot serialize Singleton.' );
    }

    public function __unserialize( array $data ) : void {
        throw new \Exception( 'Cannot unserialize Singleton.' );
    }

    private function __clone() {}

    protected function __construct() {}

    static final public function setInstance() : ?self {
        static $instance = null;

        $traces = \debug_backtrace( \DEBUG_BACKTRACE_IGNORE_ARGS, 2 );
        $trace = \end( $traces );

        foreach ( [ 'class', 'function' ] as $var )
            $$var = $trace[ $var ] ?: '';

        if ( self::class === $class )
            switch ( $function ) {
                case 'getInstance' : return $instance;
                case 'unsetInstance' : return $instance = null;
            }

        if ( $instance )
            throw new \Exception( 'Singleton instance already exists.' );

        $reflection = new \ReflectionClass( static::class );

        $instance = $reflection->newInstanceWithoutConstructor();

        $constructor = $reflection->getConstructor();
        $constructor->setAccessible( true );
        $constructor->invokeArgs( $instance, \func_get_args() );

        return $instance;
    }

    static final public function getInstance() : ?self {
        return static::setInstance();
    }

    static final public function issetInstance() : bool {
        return (bool)static::getInstance();
    }

    static final public function unsetInstance() : void {
        static::setInstance();
    }
}