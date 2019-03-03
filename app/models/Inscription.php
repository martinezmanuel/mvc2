<?php
namespace App\Models;

class Inscription extends DbTable {

	public $id_membre=0;
	public $nom_membre="Renseigner le nom";
  public $adresse_email_membre ="Renseigner l'email";
  public $mot_de_passe_membre="Renseigner le mot de passe";
	const TABLE_SQL="membres";
	const TABLE_KEY="id_membre";
  const TABLE_KEY="nom_membre";
  const TABLE_KEY="adresse_email_membre";
  const TABLE_KEY="mot_de_passe_membre";
}
