<?php

function generateCharsPool($chars, $uppercase, $numbers, $symbols){
    $charsPool = '';

    if ( $chars ){
        $charsPool .= 'qwertyuiopasdfghjklzxcvbnm';
    }

    if ( $uppercase && $chars ) {
        $charsPool .=  strtoupper($charsPool);
    }

    if ($numbers){
        $charsPool .= '1234567890';
    }

    if ($symbols){
        $charsPool .= '`~!@#$^&*()_-+={[}}|\:;".?,/';
    }

    return $charsPool;
}


function createPassword($length, $repeteadElements, $charsPool = 'qwertyuiopasdfghjklzxcvbnmWERTYUIOPASDFGHJKLZXCVBNM'){
    if ($repeteadElements == false && strlen($charsPool) < $length){
        return false;
    }

    if ($length > 32 || $length < 4){
        return false;
    }

    $psw = '';

    // ? aggiungi finche' non raggiungo la dimensione voluta
    while( strlen($psw) < $length){
        $randomChar = random_int(0, strlen($charsPool) - 1);
        $psw = $psw . $charsPool[$randomChar];

        if ($repeteadElements == false){
            $charsPool = str_replace($charsPool[$randomChar], '', $charsPool );
        }
    }

    return $psw;
}