<?php
namespace App\Controllers;
use \App\Kernel;
use \App\Models\Player as PlayerModel;

class Player extends ControllerStd {

	public function defaultAction () {
			$this->listAllAction();
		}

	public function saveAction () {
		if ( $this->getParameters("playerformpseudo") != null ) {
			$newjoueur=PlayerModel::persist(array("id_joueur"=>$this->getParameters("playerformid",0),"pseudo_user"=>$this->getParameters("playerformpseudo"),"nom_user"=>$this->getParameters("playerformnom")));
			Kernel::flushDatabase();
		}
		$this->listAllAction();
	}

	public function deleteAction ($id_joueur) {
		if ( $id_joueur > 0 ) {
			$newjoueur=PlayerModel::remove($id_joueur);
			Kernel::flushDatabase();
		} else Throw New \Exception("Suppression impossible, l'identifiant est manquant");
		$this->listAllAction();
	}

	public function listAllAction () {
		$joueur=PlayerModel::findAll();
		Kernel::viewerSmarty("Liste des joueurs","playerlist.tpl",array("joueur"=>$joueur));
	}

	public function showAction ($id_joueur) {
		$joueur=array();
		$joueur[]=PlayerModel::find($id_joueur);
		if ( $joueur[0] === null ) Throw new \Exception("Le joueur $id_joueur n'existe pas");
		Kernel::viewerSmarty("Joueur n°".$id,"playerlist.tpl",array("joueur"=>$joueur));
	}

	public function createAction ($id_joueur) {
		if ( $id_joueur > 0 ){
			 $joueur=PlayerModel::find($id_joueur);
			 $title="Joueur n°".$id;
		 }

		else{
		 $joueur = new PlayerModel();
		 $title="Création d'un joueur";
		 }
		Kernel::viewerSmarty($title,"playercreate.tpl",array("joueur"=>$joueur));

	}

}
