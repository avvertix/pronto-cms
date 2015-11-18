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
        
        // Show the configured home page
        // all pages must have the menu
        
        return pageview(content_path('index.md'), 'default.frontpage');
        
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
        
        // is a page or a section ?
        
        $section = dirname($page);
        
        $is_section = content()->is_section($page);
        
        $page = basename($page);
        
        $data = [];
        
        if($is_section){

            $sec_path = $section . '/' . $page;
            
            $sec_item = content()->section($sec_path);
            // grab the index.md in the section for the content
            
            $content = app('Pronto\Markdown\Parser')->text($sec_item->content());
            
            $data = array_merge([
                'content' => $content, //'<h1>'.$sec_item->title().'</h1><p>This is a section content only for example</p>',
                'page_title' => $sec_item->title(),
                'navigation' => content()->section_menu($section)
            ], $data);
            
            return view('default.section', $data);
        }
        else {
            
            $pageitem = content()->page($page, $section);
            
            $content = app('Pronto\Markdown\Parser')->text($pageitem->content());

            $data = array_merge([
                'content' => $content,
                'page_title' => $pageitem->title(),
                'navigation' => content()->section_menu(dirname($section))
            ], $data);
            
        }
        
        // dd($data);
        
        return view('default.page', $data);
    
        

    }
    
}
