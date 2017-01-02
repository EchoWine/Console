<?php

namespace CoreWine\Console;

class Console{

	public static $drive;
	public static $commands;

	public static function addCommand($class){
		self::$commands[] = $class;
	}

	public static function getCommand($name){
		foreach((array)self::$commands as $command){
			if($command::$signature == $name)
				return $command;
		}
	}

	public function __construct(){
		
	}



	public function exec($argv){
		array_shift($argv);
		$command = self::getCommand($argv[0]);
		array_shift($argv);
		if($command){

			$command = new $command($argv);
			$command -> setConsole($this);
			$command -> handle();
		}else{
			echo "unknow command";
		}
	}

	public static function setDrive($drive){
		self::$drive = $drive;
	}

	public function call($command){
		echo "php ".drive()."app/console {$command}";
		exec("php ".drive()."app/console {$command}");
	}

	public function callScript($command){
		exec("bash ".drive().$command);
	}

}

?>