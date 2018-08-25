<?php

namespace App\Http;

class Helper
{

}

if (!function_exists('shortUrl')) {
    /**
     * Create Short URl
     * @param  $id
     * @return $str
     */
    function shortUrl($id) {
        static $map="aAbBcCdDeEfFgGhH0iIjJ1kKlL2mMnN3oOpP4qQrR5sStT6uUvV7wWxX8yYzZ9";
        $hash=intval($id)+0x100000000;
        $str = "";
        do {
            $str = $map[31+ ($hash % 31)] . $str;
            $hash /= 31;
        } while($hash >= 1);     
        return $str;
    }
}