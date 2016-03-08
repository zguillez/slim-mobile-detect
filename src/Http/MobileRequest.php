<?php

	namespace Slim\Http;

	use Psr\Http\Message\ServerRequestInterface;

	class MobileRequest extends Request implements ServerRequestInterface
	{
		protected $detect;
		function __construct($request)
		{
			parent::__construct($request->originalMethod, $request->uri, $request->headers, $request->cookies, $request->serverParams, $request->body, $request->uploadedFiles);
			$this->attributes    = $request->attributes;
			$this->uploadedFiles = $request->uploadedFiles;
			$this->bodyParsed    = $request->getParsedBody();
			$this->detect        = new \Mobile_Detect;
		}
		public function isMobile()
		{
			return $this->detect->isMobile();
		}
		public function isTablet()
		{
			return $this->detect->isTablet();
		}
		public function isiOS()
		{
			return $this->detect->isiOS();
		}
		public function isAndroidOS()
		{
			return $this->detect->isAndroidOS();
		}
	}