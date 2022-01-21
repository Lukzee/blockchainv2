<?php

class protect {
    public static function check($db, $string){
        if (is_array($string)) {
            foreach ($string as $str) {
                $str = trim(htmlspecialchars(htmlentities(strip_tags(mysqli_real_escape_string($db, $str)))));
                $strings[] = $str;
            }
        } else {
            $strings = trim(htmlspecialchars(htmlentities(strip_tags(mysqli_real_escape_string($db, $string)))));
        }
        return $strings;
    }
}
?>