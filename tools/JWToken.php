<?php

namespace Tools;

require $_SERVER["DOCUMENT_ROOT"]."/project/ApiRest/vendor/autoload.php";
use \Firebase\JWT\JWT;

$key ="private key";
auth();
function auth()
{
    $iat = time();
    $exp = $iat+60*20;
    GLOBAL $key;
    $payload = array(
        "iss"=>'http://192.168.1.42/project/ApiRest/',
        "aud"=>"http://localhost/site/",
        "iat"=>$iat,
        "exp"=>$exp
    );
    JWT::$leeway = 60;
    $jwt = JWT::encode($payload, $key, "HS512");
    $decoded = JWT::decode($jwt, $key,array("HS256"));
    var_dump($decoded);
}