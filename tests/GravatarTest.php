<?php
namespace Gone\Tests;

use Gone\Twig\GravatarExtension;
use Gone\Twig\TransformExtension;
use Gone\Twig\TransformExtensionException;
use Twig_Error_Syntax;
use PHPUnit\Framework\TestCase;

class GravatarTest extends TestCase
{
    /** @var \Twig_Environment */
    private $twig;
    /** @var \Twig_LoaderInterface */
    private $loader;

    public function setUp()
    {
        parent::setUp();
        $this->loader = new \Twig_Loader_Array([]);
        $this->twig = new \Twig_Environment($this->loader);
        $this->twig->addExtension(new GravatarExtension());
    }

    public function testNoop()
    {
        $this->twig->setLoader(new \Twig_Loader_Array([
            'testNoop'          => "{{ test_phrase }}",
        ]));
        $this->assertEquals("Test Words", $this->twig->render('testNoop', ['test_phrase' => 'Test Words']));
    }

    public function testGravatar()
    {
        $this->twig->setLoader(new \Twig_Loader_Array([
            'test'          => "{{ email|gravatar }}",
        ]));
        $this->assertEquals("https://www.gravatar.com/avatar/16442b125d8568d4ec6e53d74636db1d", $this->twig->render('test', ['email' => 'matthew@baggett.me']));
    }

    public function testGravatar200px()
    {
        $this->twig->setLoader(new \Twig_Loader_Array([
            'test'          => "{{ email|gravatar(200) }}",
        ]));
        $this->assertEquals("https://www.gravatar.com/avatar/16442b125d8568d4ec6e53d74636db1d?s=200", $this->twig->render('test', ['email' => 'matthew@baggett.me']));
    }
}
