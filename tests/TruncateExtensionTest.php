<?php

namespace Bluetel\Twig\Tests;

use Twig_Environment;
use Twig_Loader_String;
//use Bluetel\Twig\TruncateExtension;

class TruncateExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TruncateExtension
     **/
    protected $extension;

    /**
     * @var Twig_Environment
     */
    protected $twig;

    protected function setUp()
    {
        $loader = new Twig_Loader_String();
        $this->extension = new \Bluetel\Twig\TruncateExtension();
        $this->twig = new Twig_Environment($loader);
        $this->twig->addExtension($this->extension);
    }

    /**
     * @covers Bluetel\Twig\TruncateExtension::getFilters
     **/
    public function testGetFilters()
    {
        $filters = $this->extension->getFilters();
        $this->assertArrayHasKey('truncate_letters', $filters);
        $this->assertInstanceOf('\\Twig_SimpleFilter', $filters['truncate_letters']);
        $this->assertArrayHasKey('truncate_words', $filters);
        $this->assertInstanceOf('\\Twig_SimpleFilter', $filters['truncate_words']);
    }

    /**
     * @covers Bluetel\Twig\TruncateExtension::truncateLetters
     */
    public function testLettersTruncation()
    {
        $data = $this->twig->render('{{ "<b>hello world</b>"|truncate_letters(5) }}');
	$this->assertContains("<b>hello</b>", $data);
    }

    /**
     * @covers Bluetel\Twig\TruncateExtension::truncateWords
     */
    public function testWordsTruncation()
    {
        $data = $this->twig->render('{{ "<b>hello world</b>"|truncate_words(1) }}');
        $this->assertContains("<b>hello</b>", $data);
    }

    /**
     * Ensures we preserve tricky HTML entities.
     * @covers Bluetel\Twig\TruncateExtension:htmlToDomDocument
     */
    public function testHtmlEntityConversion()
    {
        $html = $this
            ->extension
            ->htmlToDomDocument("<DOCTYPE html><html><head></head><body>Foo’s bar</body></html>")
            ->saveHtml()
        ;
        $this->assertContains("Foo&rsquo;s bar", $html);
    }
}
