<?php
namespace App\Controllers;

abstract class ControllerStd {

	private $parameters;

	public function __contruct() {
		$this->setParameters(array());
	}

	public function setParameters(array $parameters) {
		$this->parameters=array();
		foreach ($parameters as $key=>$value) {
			$this->parameters[strtolower($key)]=$value;
		}
		return $this->parameters;
	}

	public function getParameters($parameter="", $defaultValue = null) {
		if ( $parameter != "" ) {
			if (array_key_exists(strtolower($parameter), $this->parameters) )
				return $this->parameters[strtolower($parameter)];
			else
				return $defaultValue;
		}
		else return $this->parameters;
	}

}
