<?php

namespace Pronto\Content;

use Symfony\Component\Finder\SplFileInfo;

class PageItem
{

	private $title = null;
	private $slug = null;
	private $path = null;
	private $file = null;
	private $description = null;

//Symfony\Component\Finder\SplFileInfo
	protected function __construct($file){
		// $this->title = $title;
		// $this->slug = $slug;
		// $this->path = $path;
		$this->file = $file;
		// $this->description = $description;
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
	
	public function slug(){
		return $this->slug;
	}



	public static function make(SplFileInfo $file){
		return new self($file);
	}

}