<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
	protected $routes = [];
	protected $responseStatus = '200 OK';
	protected $responseContentType = 'text/html';
	protected $responseBody = 'Hello world';

	public function index()
	{
		$this->addRoute('/users/gene', function () {
			$this->responseContentType = 'application/json;charset=utf8';
			$this->responseBody = '{"name": "Gene"}' . PHP_EOL;
		});
		$this->dispatch('/users/gene');
	}

	public function addRoute($routePath, $routeCallback)
	{
		$this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
	}

	public function dispatch($currentPath)
	{
		foreach ($this->routes as $routePath => $callback) {
			if ($routePath === $currentPath) {
				$callback();
			}
		}

		header('HTTP/1.1 ' . $this->responseStatus);
		header('Content-type: ' . $this->responseContentType);
		header('Content-length: ' . mb_strlen($this->responseBody));
		echo $this->responseBody;
	}
}
