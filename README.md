# Slim-Mobile-Detect

[![Analytics](https://ga-beacon.appspot.com/UA-1125217-30/zguillez/slim-mobile-detect?pixel)](https://github.com/igrigorik/ga-beacon)
[![License](http://img.shields.io/:license-mit-blue.svg)](http://doge.mit-license.org)
[![Installs](https://img.shields.io/npm/dt/slim-mobile-detect.svg)](https://coveralls.io/r/zguillez/slim-mobile-detect)
[![Join the chat at https://gitter.im/zguillez/slim-mobile-detect](https://badges.gitter.im/zguillez/slim-mobile-detect.svg)](https://gitter.im/zguillez/slim-mobile-detect?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

> [Zguillez](https://zguillez.io) | Guillermo de la Iglesia

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/Q5Q4329UT)

## Implements [Mobile-Detect](https://github.com/serbanghita/Mobile-Detect) lib for Response's write on [Slim Framework](http://www.slimframework.com/) App

![](https://camo.githubusercontent.com/c76a63e16c7bc3ebf76cb8897d456a6aacc63053/687474703a2f2f64656d6f2e6d6f62696c656465746563742e6e65742f6c6f676f2d6769746875622e706e67)

# Getting Started

### Add package to composer.json

`composer require zguillez/slim-mobile-detect`

	// composer.json
	{
	  "require": {
	    "slim/slim": "^3.0",
	    "zguillez/slim-mobile-detect": "^1.0.0"
	  }
	}
	
### Override $request and $response objects on app routes

	$app->get('/hello/{name}', function ($request, $response, $args) {
		$request  = new Slim\Http\MobileRequest($request);
		$response = new Slim\Http\MobileResponse($response);
		
		// ...
	});
		
# Usage

### On Request object:

	$request->isMobile()
Return *true* on **mobile devices** calls

	$request->isTablet()
Return *true* on mobile **tablet** (no phones) calls

	$request->isPhone()
Return *true* on mobile **phone** (no tablets) calls

	$request->isiOS()
Return *true* on mobile with **iOS** calls

	$request->isAndroidOS()
Return *true* on mobile with **Android** calls


### On Response object:

	$response->writeDesktop($data)
Write the response only on **desktop** calls

	$response->writeMobile($data)
Write the response only on **mobile** calls

	$response->writePhone($data)
Write the response only on mobile **phone** (no tablets) calls

	$response->writeTablet($data)
Write the response only on **tablet** (no phones) calls

	$response->writeIOS($data)
Write the response only on **iOS** calls

	$response->writeAndroid($data)
Write the response only on **Android** calls

# Example:

	<?php
		require 'vendor/autoload.php';
		
		$app = new Slim\App();
		$app->get('/hello/{name}', function ($request, $response, $args) {
			$request  = new Slim\Http\MobileRequest\MobileRequest($request);
			$response = new Slim\Http\MobileResponse\MobileResponse($response);
			if ($request->isMobile()) {
				//do queries for mobile
			} else {
				//do queries for desktop
			}
			$response->write("Hello " . $args['name']);
			$response->writeDesktop(" from desktop");
			$response->writeMobile(" from mobile");
			$response->writePhone(" on a phone");
			$response->writeTablet(" on a tablet");
			$response->writeIOS(" with iOS");
			$response->writeAndroid(" with Android");
			return $response;
		});
		$app->run();

# Contributing and issues

Contributors are welcome, please fork and send pull requests! If you have any ideas on how to make this project better then please submit an issue or send me an [email](mailto:mail@zguillez.io).

# License

©2016 Zguillez.io

Original code licensed under [MIT](https://en.wikipedia.org/wiki/MIT_License) Open Source projects used within this project retain their original licenses.

# Changelog

### v1.0.0 (March 8, 2016) 

* Initial implementation

[![Analytics](https://ga-beacon.appspot.com/UA-1125217-30/zguillez/slim-mobile-detect?pixel)](https://github.com/igrigorik/ga-beacon)


