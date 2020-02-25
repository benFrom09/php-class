<?php

use Psr\Http\Message\ServerRequestInterface;

function d(...$vars) {
    echo "<pre>";
    foreach($vars as $var) {
        var_dump($var);
    }
    echo "</pre>";
}


function dbConfig(string $key) {

    $dbConfig = require dirname(dirname(__DIR__))."/config/database.php";
        if(array_key_exists($key,$dbConfig)){
            return $dbConfig[$key];
        }
        $value = array_key_exists("default",$dbConfig) ? $dbConfig["connections"][$dbConfig["default"]][$key] : null;
        return $value;
}

function generateSymlink(string $origin,string $symlink) {
    if(!file_exists($symlink)) {
        mkdir($symlink);            
    }
    symlink($origin,$symlink);
}

function get_browser_lang(ServerRequestInterface $request, ?array $available = [],?string $default = null) {
    $array = $request->getServerParams();
    if(array_key_exists('HTTP_ACCEPT_LANGUAGE',$array) && !empty($array)) {
        $langs = explode(',',$array['HTTP_ACCEPT_LANGUAGE']);
        return $langs[0];
    }
}

function isAjax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}