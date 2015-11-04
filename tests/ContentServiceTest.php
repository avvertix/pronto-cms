<?php

use Pronto\Content\Content;

class ContentServiceTest extends TestCase
{
    /**
     * Test content() helper for getting Pront\Contract\Content implementation Pront\Content\Content
     *
     * @return void
     */
    public function testContentHelper()
    {
        
        $content_service = content();
        
        $this->assertInstanceOf('Pronto\Content\Content', $content_service);
        
    }
    
    
    
    /**
     * Test the retrieval of the global navigation menu
     *
     * @return void
     */
    public function testGetMenu()
    {
      
        // TODO: save the configuration file from here to test expected vs real return
        
        $content_service = content()->menu();
        
        // {
        // 	"menu": [
        // 		{
        // 			"title": "Git",
        // 			"ref": "http://git.project"
        // 		},
        // 		{
        // 			"title": "Sub Section Promoted",
        // 			"type": "section",
        // 			"ref": "example-section/sub-section-1"
        // 		},
        // 		{
        // 			"title": "Home",
        // 			"type": "page",
        // 			"ref": "index.md"
        // 		}
        // 	]
        // }
        
        $this->assertInstanceOf('Illuminate\Support\Collection', $content_service);
        
        $this->assertEquals(3, $content_service->count());
        
        $this->assertContainsOnlyInstancesOf('Pronto\Content\MenuItem', $content_service->all());
        
        // TODO: test items are equal to given menu items
    }
    
    public function testGetSections()
    {
        $sections = content()->sections();
        
        var_dump($sections);
        
        $this->assertInstanceOf('Illuminate\Support\Collection', $sections);
        
        $this->assertEquals(1, $sections->count());
        
        
        $sections2 = content()->sections('example-section');
        
        var_dump($sections2);
        
        $this->assertInstanceOf('Illuminate\Support\Collection', $sections2);
        
        $this->assertEquals(2, $sections2->count());
    }
    
    public function testGetSectionMenu()
    {
        $menu = content()->section_menu('example-section');
        
        var_dump($menu);
        
        $this->assertInstanceOf('Illuminate\Support\Collection', $menu);
        
        $this->assertEquals(8, $menu->count());
        
        $this->assertContainsOnlyInstancesOf('Pronto\Content\MenuItem', $menu->all());
        
    }
    
    public function testGetPage()
    {
        $page = content()->page('index');
        
        var_dump($page);
        
        $this->assertInstanceOf('Pronto\Content\PageItem', $page);
        
        
        $page = content()->page('index.md', 'example-section');
        
        var_dump($page);
        
        $this->assertInstanceOf('Pronto\Content\PageItem', $page);
        
        
        $page = content()->page('page-1-1.md', 'example-section/sub-section-1/');
        
        var_dump($page);
        
        $this->assertInstanceOf('Pronto\Content\PageItem', $page);
        
        $page = content()->page('page-1-1', 'example-section/sub-section-1');
        
        var_dump($page);
        
        $this->assertInstanceOf('Pronto\Content\PageItem', $page);
        
        // $this->assertEquals(8, $menu->count());
        
        // $this->assertContainsOnlyInstancesOf('Pronto\Content\MenuItem', $menu->all());
        
    }
    
    /**
     * @expectedException Pronto\Exceptions\PageNotFoundException
     */
    public function testGetPageNotFound()
    {
        $page = content()->page('home');
    }
}
