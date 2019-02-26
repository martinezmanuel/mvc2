<?php
namespace App\Controllers;
use \App\Kernel;

class Home {

	static public function defaultAction () {
		Kernel::viewerSmarty("Accueil","home.tpl");		
	}

}
