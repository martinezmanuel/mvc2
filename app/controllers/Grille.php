<?php
namespace App\Controllers;
use \App\Kernel;
class Grille {

	static public function defaultAction () {
		Kernel::viewerSmarty("Grille","grillejeu.tpl");
	}

}
