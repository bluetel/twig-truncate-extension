# Twig Truncation Extension

[![Build Status](https://travis-ci.org/Bluetel-Solutions/twig-truncate-extension.svg)](https://travis-ci.org/Bluetel-Solutions/twig-truncate-extension)

This extension attempts to solve a common problem, namely that of truncating HTML content based on the number of characters and on the number of words contained.

Other libraries we have tried [attempt to manipulate the HTML content by means of regular expressions](http://stackoverflow.com/questions/1732348/regex-match-open-tags-except-xhtml-self-contained-tags/1732454#1732454) which is liable to break, and always seems to at the worst times, hence the need for this extension.  This leverages the power of DOMDocument to safely truncate even the most complex of nested HTML documents.


## Truncating on word count ##

```twig
{% set html %}
    <h1>Test heading!</h1>
    <ul>
        <li>Hello world</li>
        <li>Foo bar</li>
        <li>Lorem Ipsum</li>
    </ul>
{% endset html %}
{{ html|truncate_words(5) }}
```

Running this returns:

```html
<h1>Test heading!</h1>
<ul>
    <li>Hello world</li>
    <li>Foo</li>
</ul>
```
  
  
## Truncating on character count ##

```twig
{% set html %}
    <h1>Test heading!</h1>
    <ul>
        <li>Hello world</li>
        <li>Foo bar</li>
        <li>Lorem Ipsum</li>
    </ul>
{% endset html %}
{{ html|truncate_letters(20) }}
```

Whereas running the above returns the following:

```html
<h1>Test heading!</h1>
<ul>
    <li>Hello wo</li>
</ul>
```


