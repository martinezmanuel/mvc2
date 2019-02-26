<?php
namespace App\Controllers;

class Game extends ControllerStd {

	public function defaultAction () {
		$parties=\App\Models\Game::findAll();
		\App\Kernel::viewerSmarty("gamelist.tpl",array("parties"=>$parties));
	}

	public function saveAction () {

		if ( $this->getParameters("gameformtitle") != null ) {
			$newpartie=\App\Models\Game::persist(array("id_partie"=>$this->getParameters("gameformid",0),"libelle_partie"=>$this->getParameters("gameformtitle")));
		}

		$this->listAllAction();
	}

	public function deleteAction ($id_partie) {
		if ( $id_partie > 0 ) {
			$newpartie=\App\Models\Game::remove($id_partie);
		} else Throw New \Exception("Suppression impossible, l'identifiant est manquant");
		$this->listAllAction();
	}

	public function listAllAction () {
		$parties=\App\Models\Game::findAll();
		\App\Kernel::viewerSmarty("gamelist.tpl",array("parties"=>$parties));

	//	\App\Kernel::viewerSmarty("gamelistjson.tpl");
	}
/*	public function listAllJsonAction () {
		$parties=\App\Models\Game::findAll();
		echo json_encode(array("parties"=>$parties));

	}*/

	public function showAction ($id_partie) {
			var_dump($id_partie);
		$parties=array();
		$parties[]=\App\Models\Game::find($id_partie);

		if ( $parties[0] === null ) Throw new \Exception("La partie $id_partie n'existe pas");
		\App\Kernel::viewerSmarty("gamelist.tpl",array("parties"=>$parties));
	}

	public function createAction ($id_partie) {
		if ( $id_partie > 0 ) $partie=\App\Models\Game::find($id_partie);
		else $partie = new \App\Models\Game();
		\App\Kernel::viewerSmarty("gamecreate.tpl",array("parties"=>$partie));
	}

}
