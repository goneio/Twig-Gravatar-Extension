<?php

namespace MatthewBaggett\Twig;

class GravatarExtension extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            'gravatar' => new \Twig_SimpleFilter('gravatar', [$this, 'gravatarFilter']),
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
