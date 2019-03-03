<?php
namespace App\Controllers;
use \App\Models\Connexion as ConnexionModel;
use \App\Kernel;


class Connexion extends ControllerStd
{

   public function defaultAction () {
    Kernel::viewerSmarty("Connexion","form-connexion.tpl");
  }
  function connexion($nom, $pass) {
  			$sql=$database->prepare("SELECT * FROM membres WHERE nom=:nom_membre  AND pass=:pass_membre ");
  			$sql->execute(array("nom"=>$nom,"pass"=>$pass));
  			if ($row = $sql->fetch()) {
  				$id=$row["id_membre"];
  			}
  			return $id;
  		}

}
