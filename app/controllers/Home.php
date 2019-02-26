<?php
namespace App\Controllers;

class Home {
	
	static public function defaultAction () {
		\App\Kernel::viewerSmarty("home.tpl");		
	}

}