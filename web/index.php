<?php
require_once('../app/Kernel.php');
require_once('../vendor/autoload.php');

try {
	\App\Kernel::router();
}
catch (Exception $e) {
	echo $e->getMessage();
}

?>
