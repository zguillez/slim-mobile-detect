<?php

	namespace Slim\Http;

	use Psr\Http\Message\ResponseInterface;

	class MobileResponse extends Response implements ResponseInterface
	{
		protected $detect;
		function __construct($response)
		{
			parent::__construct();
			$this->status  = $response->getStatusCode();
			$this->headers = $response->headers;
			$this->body    = $response->body;
			$this->detect  = new \Mobile_Detect;
		}
		public function writeDesktop($data)
		{
			if (!$this->detect->isMobile()) {
				$this->write($data);
			}

			return $this;
		}
		public function writeMobile($data)
		{
			if ($this->detect->isMobile()) {
				$this->write($data);
			}

			return $this;
		}
		public function writePhone($data)
		{
			if ($this->detect->isMobile() && !$this->detect->isTablet()) {
				$this->write($data);
			}

			return $this;
		}
		public function writeTablet($data)
		{
			if ($this->detect->isTablet()) {
				$this->write($data);
			}

			return $this;
		}
		public function writeIOS($data)
		{
			if ($this->detect->isiOS()) {
				$this->write($data);
			}

			return $this;
		}
		public function writeAndroid($data)
		{
			if ($this->detect->isAndroidOS()) {
				$this->write($data);
			}

			return $this;
		}
	}