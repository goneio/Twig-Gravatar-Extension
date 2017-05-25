<?php

namespace Gone\Twig;

class GravatarExtension extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            'gravatar' => new \Twig_SimpleFilter('gravatar', [$this, 'gravatarFilter']),
        );
    }

    public function gravatarFilter($email, $size = null, $default = null)
    {
        $defaults = array(
            '404',
            'mm',
            'identicon',
            'monsterid',
            'wavatar',
            'retro',
            'blank'
        );

        $hash = md5($email);
        $url = 'https://www.gravatar.com/avatar/'.$hash;

        // Size
        if (!is_null($size)){
            $url .= "?s=$size";
        }

        // Default
        if (!is_null($default)){
            $url .= is_null($size) ? '?' : '&';
            $url .= in_array($default, $defaults) ? $default : urlencode($default);
        }

        return $url;
    }

    public function getName()
    {
        return 'gravatar_extension';
    }
}
