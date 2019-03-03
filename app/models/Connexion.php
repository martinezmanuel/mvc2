<?php
namespace App\Models;

class Connexion extends DbTable {

	public $id_membre=0;
  public $adresse_email_membre ="";
  public $mot_de_passe_membre="";
	const TABLE_SQL="membres";
	const TABLE_KEY="id_membre";
  const TABLE_KEY="email_membre";
  const TABLE_KEY="pass_membre";

}
