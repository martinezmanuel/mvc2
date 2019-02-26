<?php
namespace App\Models;

class Player extends DbTable {

	public $id_joueur=0;
	public $pseudo_user="";
	public $nom_user="";
	const TABLE_SQL="joueur";
	const TABLE_KEY="id_joueur";

}
