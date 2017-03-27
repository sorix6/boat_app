<?php
	header('content-type: application/json; charset=utf-8');
	header("access-control-allow-origin: *");
	
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require '../vendor/autoload.php';
	
	// autoload onwn classes
	spl_autoload_register(function ($classname) {
		require ("../classes/" . $classname . ".php");
	});

	$app = new \Slim\App;
	
	// add dependencies
	$container = $app->getContainer();
	
	// Monolog
	$container['logger'] = function($c) {
		$logger = new \Monolog\Logger('my_logger');
		$file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
		$logger->pushHandler($file_handler);
		return $logger;
	};
	
	$app->post('/powerRequirements', function (Request $request, Response $response) {
		try{
			$allPostPutVars = $request->getParsedBody();

			$powerRequirements = new PowerRequirements($allPostPutVars['hull_length'], $allPostPutVars['buttock_angle'], $allPostPutVars['displacement']);

			return $response->withJson($powerRequirements->getStats());
		}
		catch(Exception $ex){
			$this->logger->addInfo($ex->getMessage() . ' on line ' . $ex->getLine());
		}
		
		
	});
	
	$app->run();