<?php

require '../tempura.php';

// Let's make some Tempura!
$tempura = new Tempura(array(
	'path' => './templates',
	'extension' => '.html'
));

// You can set variables individually like this
$tempura->set('media_url', './media');

// You can also pass a bunch of them in an array
$tempura->set(array(
	'site_name' => 'Example - tempura.php',
	'some_name' => 'Houssam Haidar',
	'some_url' => 'http://houssam.org'
));

// Or if method chaining floats your boat...
$tempura
	->set('subtitle', 'Yep, this is a template alright.')
	->set('copyright', '&copy; ' . date('Y'));

// We need some kitties
$kittens = array();
foreach(range(0, 3) as $i):
	$kittens[] = array(
		'url' => 'http://placekitten.com/100/100',
		'description' => 'Just another kitten...'
	);
endforeach;

// Passin' them kitties to our template
$tempura->set('kittens', $kittens);

// GO! GO! GO!
$tempura->render('example');