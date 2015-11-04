<?php

namespace Pronto\Content;

use Pronto\Contracts\Content as ContentContract;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

use Pronto\Exceptions\InvalidMenuItemException;

class Content implements ContentContract
{
	
	/**
     * The filesystem service instance
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $filesystem = null;
    
    /**
     * The path where the markdown files are stored
     *
     * @var string
     */
    private $storage_path = '.';
    
    private $config = null;
	
	function __construct(Filesystem $fileSystemService){
        
		$this->filesystem = $fileSystemService;
        // dd(config('pronto.content_folder'));
        $this->storage_path = content_path();
        
        $config_path = realpath(storage_path('app/config.json'));
        
        if(@is_file($config_path)){
            $this->config = json_decode(file_get_contents($config_path));
        }
        
//         $files = $this->filesystem->files()
// directories
        
	}
	
    /**
      Get the global navigation menu.
      
      return collection of menu items grabbed from the config + first level sections (if enabled in the configuration)
    
    */
    function menu(){
        $items = array();
        
        // grab config menu elements
        if(!is_null($this->config) && property_exists($this->config, 'menu')){
        
            // dd($this->config->menu);
            
            $items = array_merge($items, array_filter(array_map(function($el){
                
                // InvalidMenuItemException
                
                // "title": "Home",
                // "type": "page",
                // "ref": "index.md"
                
                $menu_el = null;
                
                if(!property_exists($el, 'title') || !property_exists($el, 'ref')){
                    throw new InvalidMenuItemException('Menu element should contain at least title and ref attributes', $el);
                } 
                
                if(property_exists($el, 'type') && method_exists(MenuItem::class, $el->type)){
                    $menu_el = MenuItem::{$el->type}($el->title, $el->ref); 
                }
                else {
                    $menu_el = MenuItem::link($el->title, $el->ref);
                }
                
                return $menu_el;
                
            }, $this->config->menu)));
            
        }
        
        // grab first level sections if defined to do so in config 
        if(config('pronto.sections_in_menu', false)){
            // TODO: sections in menu
        }
        
        // return MenuItem collection
        
        return Collection::make($items);
    }
	
	function pages($section = null){
        return $this->getNavigationMenu();
    }
    
    function page($name, $section){
        
    }
	
	function sections($section = null){
    
    }
	
	function section_navigation($section = null){
    
    }
    
    /**
     retrieve all the content references
    */
    private function _all(){
        // faccio lo scan ricorsivo di tutto il contenuto nella cartella "content"
    }
    
    
    private function getNavigationMenu(){
        
        // $section_path = $this->storage_path . '/' . $section . '/';
        
        $sections = $this->filesystem->directories($this->storage_path);
        
        // if configuration exists, the configured sections govern the ordering and the sections showed.
        // if in each section the array of pages exists it control what pages are showed and in which order
        
        if(!is_null($this->config) && property_exists($this->config, 'sections')){
            // dd(array('dirs' => $directories, 'config' => $this->config));
            
            // filters directories based on what is in the config
            
            // order directories based on the config
            
            $sections = array_filter(array_map(function($section){
                
                $section->ref = $this->storage_path . '/' . $section->ref;
                
                return @is_dir($section->ref) ? $section : false; // return false in case the check for the directory existence fails
                
            }, $this->config->sections));
        }
        
        // dd($sections);
        
        $menu = array();
        
        $all_files = array();
        foreach ($sections as $sec) {
            
            $dir = is_string($sec) ? $sec : $sec->ref;
            
            $section_ref = basename($dir); 
            
            $name = is_string($sec) ? ucwords(str_replace('_', ' ', str_replace('-', ' ', $section_ref))) : $sec->title;
            
            
            
            // get markdown (md) files in the section or get pages from the configured array of pages
            $all_files = (is_string($sec) && !property_exists($sec, 'pages')) ? $this->filesystem->glob($dir . '/*.md') : array_filter(array_map(function($p) use($dir){
                $file = $dir . '/' . $p;
                return @file_exists($file) && @is_file($file) ? $file : false;
            }, $sec->pages));
            
            $mapped = array_map(function($el) use($dir, $section_ref){
                
                $f = str_replace('.md', '', basename($el));
                
                return array(
                    'name' => ucwords(str_replace('_', ' ', str_replace('-', ' ', $f))),
                    'section' => str_slug($section_ref),
                    'page' => str_slug($f)
                );
                
                // dd($el);
                
            }, $all_files);
            
            
            
            $menu[] = array(
                'name' => $name,
                'child' => $mapped
            );
            
        }
        
        return $menu;
    }
	

}