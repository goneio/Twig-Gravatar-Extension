<?php

namespace MatthewBaggett\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GravatarExtension extends AbstractExtension
{

    public function getFilters()
    {
        return array(
            'gravatar' => new TwigFilter('gravatar', [$this, 'gravatarFilter']),
        );
    }

    public function gravatarFilter($email, $size = null)
    {
        $hash = md5($email);
        $url = 'https://www.gravatar.com/avatar/'.$hash;

        // Size
        if (!is_null($size)) {
            $url .= "?s=$size";
        }

        return $url;
    }

    public function getName()
    {
        return 'gravatar_extension';
    }
}
