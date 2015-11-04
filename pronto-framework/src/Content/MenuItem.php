<?php

namespace Pronto\Content;

class MenuItem
{

	const SECTION = 'section';
	
	const PAGE = 'page';
	
	const LINK = 'link';

	private $title = null;
	private $type = null;
	private $path = null;
	private $level = null;


	private function __construct($name, $type, $path, $level = 1){
		$this->title = $name;
		$this->type = $type;
		$this->path = $path;
		$this->level = $level;
	}


	public function title(){
		return $this->title;
	}
	
	public function type(){
		return $this->type;
	}
	
	public function path(){
		return $this->path;
	}
	
	public function level(){
		return $this->level;
	}




	public static function section($name, $path, $level = 1){
		return new self($name, self::SECTION, $path, $level);
	}
	
	public static function link($name, $path, $level = 1){
		return new self($name, self::LINK, $path, $level);
	}
	
	public static function page($name, $path, $level = 1){
		return new self($name, self::PAGE, $path, $level);
	}

}