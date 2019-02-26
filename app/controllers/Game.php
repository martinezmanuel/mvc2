<?php
namespace App\Controllers;
use \App\Models\Game as GameModel;
use \App\Kernel;

class Game extends ControllerStd {

	public function defaultAction () {
		$this->listAllAction();
	}

	public function saveAction () {

		if ( $this->getParameters("gameformtitle") != null ) {
			$newpartie=GameModel::persist(array("id_partie"=>$this->getParameters("gameformid",0),"libelle_partie"=>$this->getParameters("gameformtitle")));
			Kernel::flushDatabase();
		}

		$this->listAllAction();
	}

	public function deleteAction ($id_partie) {
		if ( $id_partie > 0 ) {
			$newpartie=GameModel::remove($id_partie);
			Kernel::flushDatabase();
		} else Throw New \Exception("Suppression impossible, l'identifiant est manquant");
		$this->listAllAction();
	}

	public function listAllAction () {
		/*$partie=\App\Models\Game::findAll();
		\App\Kernel::viewerSmarty("gamelist.tpl",array("partie"=>$partie));*/
		Kernel::viewerSmarty("Liste des parties","gamelistjson.tpl");
	}

	public function listAllJsonAction () {
		$partie=GameModel::findAll();
		header("Content-type:application/json");
		echo json_encode(array("partie"=>$partie),JSON_PRETTY_PRINT);

	}

	public function showAction ($id_partie) {
		$partie=array();
		$partie[]=GameModel::find($id_partie);

		if ( $partie[0] === null ) Throw new \Exception("La partie $id_partie n'existe pas");
		Kernel::viewerSmarty("Partie n°".$id,"gamelist.tpl",array("partie"=>$partie));
	}

	public function createAction ($id_partie) {
		if ( $id_partie > 0 ){
		$partie=GameModel::find($id_partie);
		$title="Partie n°".$id;
	}
		else {
			$partie = new \App\Models\Game();
			$title="Nouvelle partie";
		}
		Kernel::viewerSmarty($title,"gamecreate.tpl",array("partie"=>$partie));


}
}
