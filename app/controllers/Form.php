<?php
namespace App\Controllers;

class Form {
	
	static public function defaultAction () {
		\App\Kernel::viewerSmarty("form.tpl");		
	}

}