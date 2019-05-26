<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HelpersTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    
    /**
     * Test my_locale_url()
     *
     * @return void
     */
    public function testMyLocaleUrl()
    {
        $this->get('http://test.com:8080');
        $actual = my_locale_url('ja');
        $this->assertEquals('http://test.com:8080/?lang=ja', $actual);
        
        $this->get('http://example.jp:9999/?lang=ja');
        $actual = my_locale_url('en');
        $this->assertEquals('http://example.jp:9999/?lang=en', $actual);
        
        $this->get('https://example.en/posts?lang=en&page=2');
        $actual = my_locale_url('ja');
        $this->assertEquals('https://example.en/posts?lang=ja&page=2', $actual);
    }
}
