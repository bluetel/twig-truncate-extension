# Twig Truncation Extension

This extension attempts to solve a common problem, namely that of truncating HTML content based on the number of characters and on the number of words contained.


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

```
    <h1>Test heading!</h1>
    <ul>
        <li>Hello wo/li>
    </ul>
```


