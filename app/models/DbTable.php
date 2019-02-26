<?php
namespace App\Models;

abstract class DbTable {

	protected static $table;

	static function findAll(){
		$class=get_called_class();
		$object=new $class;
		$fieldList="";
		foreach ($object as $name => $value) {
				$fieldList.="$name,";
		}
		$fieldList =substr($fieldList,0,strlen($fieldList)-1);
		$statement=\App\Kernel::getDatabase()->query('SELECT '.$fieldList.' FROM '.static::TABLE_SQL.' WHERE 1');
		$statement->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE,$class);
		return $statement->fetchAll();
	}

	static function persist($fieldstoinsert){
		$values=array();
		foreach ($fieldstoinsert as $name => $value) {
			$values[strtolower($name)]=$value;
		}
		$class=get_called_class();
		$object=new $class;
		$fieldList="";
		$fieldValueList="";
		// Chargement de l'objet avec les propriétés fournies en paramètres d'entrée de fonction
		foreach ($object as $name => $value) {
				if (  array_key_exists ( strtolower($name),$values)   ) {
					$object->$name=$values[$name];
				}
		}

		// Si l'id est fourni en entrée et non nul on part sur un update
		if ( array_key_exists ( static::TABLE_KEY, $values ) && $values[static::TABLE_KEY] > 0 ) $typesave="update";
		elseif ( array_key_exists ( static::TABLE_KEY, $values ) && $values[static::TABLE_KEY] == 0 ) $typesave="insert";
			else $sql="";

		if ( $typesave=="update" ) {
			// Pour un update, on ne valorise que les propriétés en entrée (hors id)
			foreach ($object as $name => $value) {
					if (  array_key_exists ( strtolower($name),$values) &&  $name != static::TABLE_KEY  ) {
						$fieldList.="$name='".str_replace("'","\'",$value)."',";
					}
			}
			if ( $fieldList == "" ) Throw new \Exception("Erreur sur les valeurs en entrée sur insert ".static::TABLE_SQL);
			$fieldList =substr($fieldList,0,strlen($fieldList)-1);
			$fieldValueList =substr($fieldValueList,0,strlen($fieldValueList)-1);
			$sql='UPDATE '.static::TABLE_SQL.' SET '.$fieldList.' WHERE id='.$values[static::TABLE_KEY].';';
		}

		if ( $typesave=="insert" ) {
			// Pour un insert, on valorise avec toutes les propriétés de l'objet en utilisant les valeurs par défaut du Models\TABLE_SQL (hors id)
			foreach ($object as $name => $value) {
					if (  array_key_exists ( strtolower($name),$values ) && ( strtolower($name) != static::TABLE_KEY ) ) {
						$fieldList.="$name,";
						$fieldValueList.="'".str_replace("'","\'",$value)."',";
					}
			}
			if ( $fieldList == "" ) Throw new \Exception("Erreur sur les valeurs en entrée sur insert ".static::TABLE_SQL);
			$fieldList =substr($fieldList,0,strlen($fieldList)-1);
			$fieldValueList =substr($fieldValueList,0,strlen($fieldValueList)-1);
			$sql='INSERT INTO  '.static::TABLE_SQL.' ('.$fieldList.') VALUES ('.$fieldValueList.');';
		}
		// var_dump($sql);
		if ( $sql != "" ) return \App\Kernel::getDatabase()->exec($sql); else return false;
		return false;
	}

	static function remove( $id ){
		$statement=\App\Kernel::getDatabase()->query('DELETE FROM '.static::TABLE_SQL.' WHERE '.static::TABLE_KEY.'='.$id);
		return $statement;
	}

	static function find($id){
		$class=get_called_class();
		$object=new $class;
		$fieldList="";
		foreach ($object as $name => $value) {
				$fieldList.="$name,";
		}
		$fieldList =substr($fieldList,0,strlen($fieldList)-1);
		$statement=\App\Kernel::getDatabase()->query('SELECT '.$fieldList.' FROM '.static::TABLE_SQL.' WHERE '.static::TABLE_KEY.'='.$id);
		$statement->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE,$class);
		if ($statement->rowCount() === 1) return $statement->fetchObject($class);
		return null;
	}

}
