Twig-Gravatar
=============

[![Build Status](https://travis-ci.org/goneio/Twig-Gravatar-Extension.svg?branch=master)](https://travis-ci.org/goneio/Twig-Gravatar-Extension)

Add support for transforming an email address into a gravatar image URL in a simple filter.

###Usage:

```twig
    <img src="{{ user.email|gravatar }}"/>
```