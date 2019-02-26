<?php
namespace App\Models;

class Game extends DbTable {

	public $id_partie=0;
	public $libelle_partie="Renseigner le titre";
	const TABLE_SQL="partie";
	const TABLE_KEY="id_partie";

}
