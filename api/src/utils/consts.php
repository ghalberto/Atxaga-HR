<?php

//CORS
define('ALLOWEDHEADERSARRAY', [
    "X-API-KEY",
    "Origin",
    "X-Requested-With",
    "Content-Type",
    "Accept",
    "Access-Control-Request-Method",
    "Access-Control-Request-Headers",
    "Authorization"
]);
define('ALLOWEDHEADERS', implode(",", ALLOWEDHEADERSARRAY));

//Culture
define('TIMEZONE', 'America/Lima');

//HTTP
define('REQUEST_METHOD', "REQUEST_METHOD");

define('HTTP_METHOD_GET', "GET");
define('HTTP_METHOD_POST', "POST");
define('HTTP_METHOD_PUT', "PUT");
define('HTTP_METHOD_DELETE', "DELETE");

//Messages
define('MESSAGE_CODE_200', "SUCCESS");
define('MESSAGE_CODE_404', "NOTFOUND");
define('MESSAGE_CODE_500', "ERROR");
