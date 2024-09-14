<?php 

class StaticClass {
    public static $angka = 1;

    public static function sayHello() {
        return "Hello " . self::$angka++ . "x";
    }
}

$obj1 = new StaticClass();
echo StaticClass::sayHello();
echo "<br>";

$obj2 = new StaticClass();
echo StaticClass::sayHello();
echo "<br>";