<?php

require_once 'jwt/BeforeValidException.php';
require_once 'jwt/ExpiredException.php';
require_once 'jwt/SignatureInvalidException.php';
require_once 'jwt/JWT.php';
require_once 'jwt/JWK.php';
require_once 'jwt/Key.php';


use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class JWTAuth
{
     
    function encodekey($payload)
    {
        /**
         * IMPORTANT:
         * You must specify supported algorithms for your application. See
         * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
         * for a list of spec-compliant algorithms.
         */
        $jwt = JWT::encode($payload, "kjas341kasd1.2123", "HS256");

       return $jwt;
    }

    function decodekey ($jwt) {
        JWT::$leeway = 60; // $leeway in seconds
        $decoded = JWT::decode($jwt, new Key("kjas341kasd1.2123", 'HS256'));
        
       return $decoded;
    }
}
