# Slim\_Mobile\_Detect

[![npm version](https://badge.fury.io/js/slim_mobile_detect.svg)](https://badge.fury.io/js/slim_mobile_detect)
[![Build Status](http://img.shields.io/travis/zguillez/slim_mobile_detect.svg)](https://github.com/zguillez/slim_mobile_detect)
[![Code Climate](http://img.shields.io/codeclimate/github/zguillez/slim_mobile_detect.svg)](https://codeclimate.com/github/zguillez/slim_mobile_detect)
[![Dependency Status](https://gemnasium.com/zguillez/slim_mobile_detect.svg)](https://gemnasium.com/zguillez/slim_mobile_detect)
[![Installs](https://img.shields.io/npm/dt/slim_mobile_detect.svg)](https://coveralls.io/r/zguillez/slim_mobile_detect)
![](https://reposs.herokuapp.com/?path=zguillez/slim_mobile_detect)
[![License](http://img.shields.io/:license-mit-blue.svg)](http://doge.mit-license.org)
[![Analytics](https://ga-beacon.appspot.com/UA-1125217-30/zguillez/slim_mobile_detect?pixel)](https://github.com/igrigorik/ga-beacon)
[![Join the chat at https://gitter.im/zguillez/slim_mobile_detect](https://badges.gitter.im/zguillez/slim_mobile_detect.svg)](https://gitter.im/zguillez/slim_mobile_detect?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Implements Mobile_Detect lib for Response's write on Slim Framework App

# Getting Started

### Add package to composer.json

`composer require zguillez/slim_mobile_detect`

	//packaje.json
	{
	  "require": {
	    "slim/slim": "^3.0",
	    "zguillez/slim_mobile_detect": "^1.0.0"
	  }
	}
	
### Override $request and $response objects on app routes

	$app->get('/hello/{name}', function ($request, $response, $args) {
		$request  = new Slim\Http\MobileRequest($request);
		$response = new Slim\Http\MobileResponse($response);
		
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
		use Slim\Http\MobileRequest;
		use Slim\Http\MobileResponse;
		$app = new Slim\App();
		$app->get('/hello/{name}', function ($request, $response, $args) {
			$request  = new MobileRequest($request);
			$response = new MobileResponse($response);
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
	Status API Training Shop Blog About Pricing

# Contributing and issues

Contributors are welcome, please fork and send pull requests! If you have any ideas on how to make this project better then please submit an issue or send me an [email](mailto:mail@zguillez.io).

# License

©2016 Zguillez.io

Original code licensed under [MIT](https://en.wikipedia.org/wiki/MIT_License) Open Source projects used within this project retain their original licenses.

# Changelog

### v1.0.0 (March 8, 2016) 

* Initial implementation





