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