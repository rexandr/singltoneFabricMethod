<?php
//namespace Myprogect;

class Singltone
{
    private static $singles = [];

    protected function __construct() {}
    protected function __clone() {}
    protected function __wakeup() {}

    public static function getSingle()
    {
        $subClass = static::class;
        if (!isset(self::$singles[$subClass]))
        {
            self::$singles[$subClass] = new static();
        }
        echo '<pre>';
        print_r(self::$singles);
        echo '</pre>';
        echo '<pre>';
        print_r('subclass'.$subClass);
        echo '</pre>';
        
        
        return self::$singles[$subClass];
    }
}
