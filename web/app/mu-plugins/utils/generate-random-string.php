<?php

function generateRandomString($number_of_letters){
    $result = "";
    $char_universe = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    // $char_universe = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    
    for ($i = 0; $i < $number_of_letters; $i++){
        $rand_int = rand(0, strlen($char_universe));
        $rand_char = $char_universe[$rand_int];
        $result = $result . $rand_char;
    }

    return $result;
}