<?php
namespace App\Controllers;
use \App\Models\Inscription as InscriptionModel;
use \App\Kernel;

/**
 *
 */
class Inscription extends ControllerStd
{

   public function defaultAction () {
    Kernel::viewerSmarty("Inscription","form-inscription.tpl");
  }

  public function saveAction () {
    if ( $this->getParameters("inscriformname") != null ) {
      $newjoueur=PlayerModel::persist(array("id_membre"=>$this->getParameters("inscriformid",0),"nom_membre"=>$this->getParameters("inscriformname"),"email_membre"=>$this->getParameters("inscriformemail"),"pass_membre"=>$this->getParameters("inscriformpass")));
      Kernel::flushDatabase();
    }
    $this->listAllAction();
  }
}
