<?php
namespace App\Controllers;

class Player extends ControllerStd {

	public function defaultAction () {
		$joueurs=\App\Models\Player::findAll();
		\App\Kernel::viewerSmarty("playerlist.tpl",array("joueurs"=>$joueurs));
	}

	public function saveAction () {
		if ( $this->getParameters("playerformpseudo") != null ) {
			$newjoueur=\App\Models\Player::persist(array("id_joueur"=>$this->getParameters("playerformid",0),"pseudo_user"=>$this->getParameters("playerformpseudo"),"nom_user"=>$this->getParameters("playerformnom")));
		}
		$this->listAllAction();
	}

	public function deleteAction ($id_joueur) {
		if ( $id_joueur > 0 ) {
			$newjoueur=\App\Models\Player::remove($id_joueur);
		} else Throw New \Exception("Suppression impossible, l'identifiant est manquant");
		$this->listAllAction();
	}

	public function listAllAction () {
		$joueurs=\App\Models\Player::findAll();
		\App\Kernel::viewerSmarty("playerlist.tpl",array("joueurs"=>$joueurs));
	}

	public function showAction ($id_joueur) {
		$joueurs=array();
		$joueurs[]=\App\Models\Player::find($id_joueur);
		if ( $joueurs[0] === null ) Throw new \Exception("Le joueur $id_joueur n'existe pas");
		\App\Kernel::viewerSmarty("playerlist.tpl",array("joueurs"=>$joueurs));
	}

	public function createAction ($id_joueur) {
		if ( $id_joueur > 0 ) $joueur=\App\Models\Player::find($id_joueur);
		else $joueur = new \App\Models\Player();
		\App\Kernel::viewerSmarty("playercreate.tpl",array("joueurs"=>$joueur));
	}

}
