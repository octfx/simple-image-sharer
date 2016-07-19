<?php
define( 'basedir', __DIR__ );
define( 'imagedir', basedir.'/images/' );
require_once basedir . '/AltoRouter.php';
$routerPath = '';
$Router = new AltoRouter();
$Router -> setBasePath( $routerPath );
$Router -> map( 'GET', '/', basedir.'/start.html', 'index' );
$Router -> map( 'GET', '/[*:imgid]', basedir.'/imagefetch.php', 'fetch' );

$match = $Router -> match();
if( $match ){
    require $match['target'];
}else{
  header("HTTP/1.0 404 Not Found");
}
