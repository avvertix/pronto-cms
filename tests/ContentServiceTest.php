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
}
