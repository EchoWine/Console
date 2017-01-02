<?php

namespace CoreWine\Console;

class Command{

	public $console;

	public static $signature;

	public $parameters;

	public function __construct($argv){
		$this -> parameters = $argv;
	}

	public function call($command){
		
		$this -> getConsole() -> call($command);
	}

	public function setConsole($console){
		$this -> console = $console;
	}

	public function getConsole(){
		return $this -> console;
	}

}

?>