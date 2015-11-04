<?php

namespace App\Http\Controllers;

use \Illuminate\Filesystem\Filesystem;
use Pronto\Exceptions\PageNotFoundException;
use ParsedownExtra;
use App\ExtendedParsedownExtra;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PageController extends Controller
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
        
        $this->storage_path = storage_path('app/content');
        
        if(@is_file($this->storage_path . '/config.json')){
            $this->config = json_decode(file_get_contents($this->storage_path . '/config.json'));
        }
    }
    
    
    
    
    /**
     * Show the home page of the developer documentation website
     *
     * @return Response
     */
    public function index(){
        
        // Show the configured home page
        // all pages must have the menu
        
        return view('global', ['menu' => $this->getNavigationMenu()]);
        
    }
    
    
    /**
     * Show a specific documentation page.
     *
     * Note: slugs uses dash as replace of spaces and underscores and are composed by lower case letters
     *
     * @param  string  $section The section slug that contain the requested page
     * @param  string  $page The page slug that needs to be loaded
     * @return Response
     */
    public function show($section, $page)
    {
    
        $content = $this->getDocPage($section, $page);
        
        $title = ucwords(str_replace('_', ' ', str_replace('-', ' ', $page)));
    
        return view('global', [
            'content' => $content, 
            'page_title' => $title, 
            'menu' => $this->getNavigationMenu()]);

    }
    
    
    /**
     * Show a specific documentation page.
     *
     * Note: slugs uses dash as replace of spaces and underscores and are composed by lower case letters
     *
     * @param  string  $section The section slug that contain the requested page
     * @param  string  $page The page slug that needs to be loaded
     * @return Response
     */
    public function resource(Request $request, $section, $file)
    {
    
        $section_path = $this->storage_path . '/' . $section . '/';
        if(!$this->filesystem->isDirectory($section_path)){
            $section_path = $this->storage_path . '/' . str_replace('-', '_', $section) . '/';
        }
        
        $file_path = $section_path . 'images/'. $file;
        
        if($this->filesystem->isDirectory($section_path) && $this->filesystem->isFile($file_path)){
        
        
            return Image::make($file_path)->response();
        
            // dd(compact('request', 'section', 'file'));
            
        }
        
        abort(404);
    
        
        // $content = $this->getDocPage($section, $page);
    
        // return view('global', ['content' => $content, 'menu' => $this->getNavigationMenu()]);

    }
    

    private function getDocPage($section, $page){
        //getting-started => !directory => getting_started
        // dd(str_slug($section));
        
        $section_path = $this->storage_path . '/' . $section . '/';
        if(!$this->filesystem->isDirectory($section_path)){
            $section_path = $this->storage_path . '/' . str_replace('-', '_', $section) . '/';
        }
        $file_path = $section_path . $page . '.md';
        
        if(!$this->filesystem->isFile($file_path)){
            $file_path = $section_path . str_replace('-', '_', $page) . '.md';
        }
        
        
        if($this->filesystem->isDirectory($section_path) && $this->filesystem->isFile($file_path)){
            
            $Parsedown = new ExtendedParsedownExtra();
            
            $Parsedown->setBreaksEnabled(true);
            
            // TODO: extract the list of headings
            // TODO: get the first header for the page title

            $parsed = $Parsedown->text($this->filesystem->get($file_path));
            
            return $parsed;
        }
        
        throw new PageNotFoundException($section . ', '.$page);
    }
    
    
}
