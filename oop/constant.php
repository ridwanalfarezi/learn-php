<?php

class ConstantClass {
    const APPLICATION = "Belajar PHP OOP";
    public function cetak() {
        return "Hello " . self::APPLICATION;
    }
}

$obj = new ConstantClass();
echo $obj->cetak();