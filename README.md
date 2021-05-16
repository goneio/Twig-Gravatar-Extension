Twig-Gravatar
=============

[![Build Status](https://travis-ci.org/matthewbaggett/Twig-Gravatar-Extension.svg?branch=master)](https://travis-ci.org/matthewbaggett/Twig-Gravatar-Extension)

Add support for transforming an email address into a gravatar image URL in a simple filter.

###Usage:

```twig
    <img src="{{ user.email|gravatar }}"/>
```