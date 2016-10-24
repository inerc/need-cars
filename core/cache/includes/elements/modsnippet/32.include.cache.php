<?php
$sapi_name = php_sapi_name();
if ($sapi_name == 'cgi' || $sapi_name == 'cgi-fcgi') {
    header('status: 404 Not Found');
} else {
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
}
return;
