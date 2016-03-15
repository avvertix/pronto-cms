<?php

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->get('/');
        
        $this->assertRegExp(
            '/Pronto/', $this->response->getContent()
        );
    }
}
