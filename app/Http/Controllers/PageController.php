<?php

namespace App\Http\Controllers;

use Pronto\Exceptions\PageNotFoundException;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManagerStatic as Image;

class PageController extends Controller
{
    // /**
    //  * The filesystem service instance
    //  *
    //  * @var \Illuminate\Filesystem\Filesystem
    //  */
    // private $filesystem = null;
    // 
    // /**
    //  * The path where the markdown files are stored
    //  *
    //  * @var string
    //  */
    // private $storage_path = '.';
    // 
    // private $config = null;
    
    function __construct(){
        
        // $this->filesystem = $fileSystemService;
        // 
        // $this->storage_path = storage_path('app/content');
        // 
        // if(@is_file($this->storage_path . '/config.json')){
        //     $this->config = json_decode(file_get_contents($this->storage_path . '/config.json'));
        // }
    }
    
    
    
    
    /**
     * Show the home page of the developer documentation website
     *
     * @return Response
     */
    public function index(){
        
        
        //app('translator')->setLocale('en');
        
        $p = content()->homepage();
        
        // echo '</pre>';
        return view('default.frontpage', [
            'page' => $p
        ]);
        
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
    public function show($page)
    {
        
        $p = content()->page($page);
        
        return view('default.page', [
            'page_title' => $p->title(),
            'page' => $p,
            'section_menu' => content()->pages($p->path())
        ]);
    
    }
    
}
