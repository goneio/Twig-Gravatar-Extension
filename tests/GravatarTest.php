<?php
namespace MatthewBaggett\Tests;

use MatthewBaggett\Twig\GravatarExtension;
use MatthewBaggett\Twig\TransformExtension;
use MatthewBaggett\Twig\TransformExtensionException;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\LoaderInterface;
use Twig_Error_Syntax;
use PHPUnit\Framework\TestCase;

class GravatarTest extends TestCase
{
    /** @var Environment */
    private $twig;
    /** @var LoaderInterface */
    private $loader;

    public function setUp() : void
    {
        parent::setUp();
        $this->loader = new ArrayLoader([]);
        $this->twig = new Environment($this->loader);
        $this->twig->addExtension(new GravatarExtension());
    }

    public function testNoop()
    {
        $this->twig->setLoader(new ArrayLoader([
            'testNoop'          => "{{ test_phrase }}",
        ]));
        $this->assertEquals("Test Words", $this->twig->render('testNoop', ['test_phrase' => 'Test Words']));
    }

    public function testGravatar()
    {
        $this->twig->setLoader(new ArrayLoader([
            'test'          => "{{ email|gravatar }}",
        ]));
        $this->assertEquals("https://www.gravatar.com/avatar/16442b125d8568d4ec6e53d74636db1d", $this->twig->render('test', ['email' => 'matthew@baggett.me']));
    }

    public function testGravatar200px()
    {
        $this->twig->setLoader(new ArrayLoader([
            'test'          => "{{ email|gravatar(200) }}",
        ]));
        $this->assertEquals("https://www.gravatar.com/avatar/16442b125d8568d4ec6e53d74636db1d?s=200", $this->twig->render('test', ['email' => 'matthew@baggett.me']));
    }
}
