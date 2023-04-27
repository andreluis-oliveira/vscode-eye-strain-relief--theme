<?php
trait World {

    private static $instance;
    protected $tmp;

    public static function World()
    {
        self::$instance = new static();
        self::$instance->tmp = get_called_class().' '.__TRAIT__;

        return self::$instance;
    }

}

if ( trait_exists( 'World' ) ) {

    class Hello {
        use World;

        public function text( $str )
        {
            return $this->tmp.$str;
        }
    }

}

echo Hello::World()->text('!!!'); // Hello World!!!
