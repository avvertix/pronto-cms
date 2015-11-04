<?php

namespace Pronto\Markdown;

use ParsedownExtra;

class Parser
{
	
	private $instance = null;
	
	function __construct(ParsedownExtra $parserInstance){
		$this->instance = $parserInstance;
	}
	
	public function text($text){
		return $this->instance->text($text); 
	}
	
	public function file($path){
		// TODO: throw exception if the file do not exists
		return $this->text(@file_get_contents($path));
	}

}