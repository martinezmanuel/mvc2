<?php
namespace App\Controllers;

class Grille {

	static public function defaultAction () {
		\App\Kernel::viewerSmarty("grillejeu.tpl");
	}

}
