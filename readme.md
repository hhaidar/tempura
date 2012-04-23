**tempura.php** is a simple templating system for PHP 5.3+

## Getting started

Include **tempura.php**

```php
require '../tempura.php';
```

Create a new template object

```php
// Let's make some Tempura!
$tempura = new Tempura(array(
	'path' => './templates',
	'extension' => '.html'
));
```

If you don't want to set options, that's totally cool too

```php
// Let's make some bland Tempura!
$tempura = new Tempura();
```

This is how you load a template

```php
$tempura->render('mytemplate');
```

If you didn't set configuration options, you'll need to use the full path

```php
$tempura->render('./templates/mytemplate.html');
```

## Setting variables

There are multiple ways to set variables

```php
// Passing a single variable
$tempura->set('media_url', './media');

// You can also pass a bunch of them in an array
$tempura->set(array(
	'site_name' => 'My Website',
	'some_name' => 'John Smith',
	'some_url' => 'http://github.com'
));

// Or if method chaining floats your boat...
$tempura
	->set('subtitle', 'Yep, this is a template alright.')
	->set('copyright', '&copy; ' . date('Y'));
```

# Templates

You can print escaped variables using `$this->put($variable)`

```php
// mytemplate.html
<title><?php $this->put('site_name'); ?></title>
```

Conditionals are a snap with `$this->get($variable)`

```php
<?php if($this->get('kitten')): ?>
	<p>Meow</p>
<?php else: ?>
	<p>BARK!</p>
<?php endif; ?>
```

Loops can be done with plain old foreach. If you want to escape regular variables, use the `$this->get($variable)` utility method

```php
<?php if($this->get('kittens')): ?>
	<?php foreach($this->get('kittens') as $kitten): ?>
		<img src="<?php $this->e($kitten['url']); ?>" alt="Meow" />
	<?php endforeach; ?>
<?php endif; ?>
```

Need to load a template in a template? That totally works

```php
<header>
	<h1>My Fancy Website</h1>
	<?php $this->render('navigation'); ?>
</header>
```

## Methods

```php
<?php
$tempura->
    render($file)       		// Render a template
	config($option, $value)		// Set a configuration option
	set($variable, $value)		// Set a single variable
	set($array)					// Set multiple variables
	get($array)					// Get the raw value of a variable
	put($variable)				// Safely print a variable in a template
	e($string)					// Utility method for printing PHP variables not set in the template
```

## Upcoming features

* Built-in / Custom filters
* Asset Management (JS/CSS/etc..) + Minification
* Saving to a file
* Commandline tool

## License

(MIT License)

Copyright (c) 2012 Houssam Haidar <me@houssam.org>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.