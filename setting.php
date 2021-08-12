<?php
// ******************************
// PHP 8用
// ******************************
$pv = explode( ".", phpversion() );
if( $pv[0]+0 >= 8 ) {
	error_reporting( E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING );
}
else {
	error_reporting( E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED );
}

// ******************************
// キャッシュ
// ******************************
session_cache_limiter('nocache');
session_start();

// ******************************
// 日本語用
// ******************************
mb_language( 'Japanese' );
mb_internal_encoding( 'UTF-8' );

$GLOBALS['webdir'] = str_replace( explode('/',$_SERVER['REQUEST_URI'])[(count(explode('/',$_SERVER['REQUEST_URI']))-1)] , '', $_SERVER['REQUEST_URI'] );
$GLOBALS['app'] = '/app/';

$work = $_SERVER["SCRIPT_NAME"];
$work = pathinfo( $work );
$work = explode("/", $work["dirname"]);
$cnt = count( $work );
$path = $work[ $cnt-1 ];

?>
