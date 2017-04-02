<?php 

spl_autoload_register(function($nameClass){
	$nameClass = str_replace('\\', DIRECTORY_SEPARATOR, $nameClass);

	$dirClass = "class";
	$fileName = __DIR__ . DIRECTORY_SEPARATOR . $dirClass . DIRECTORY_SEPARATOR . $nameClass .".php";

	if ( file_exists( $fileName) ) {
		require_once($fileName);
	}

});

 ?>