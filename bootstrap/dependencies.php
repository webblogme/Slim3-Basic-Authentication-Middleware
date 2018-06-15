<?php 

// Fetch DI Container
$container = $app->getContainer();




// DATABASE
$container['db'] = function ($container) {

	$capsule = new \Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($container['settings']['db']);

	$capsule->setAsGlobal();
	$capsule->bootEloquent();

	return $capsule;
};


// TWIG
$container['view'] = function ($c) {
    
	$twig = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        //'cache' => __DIR__ . '/../cache',
		'debug' => true,
    ]);
   
    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));
	$twig->addExtension(new Twig_Extension_Debug());
	$twig->addExtension(new Twig_Extensions_Extension_Text());

    return $twig;
};


// MONOLOG
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};


// CONTROLLER
$container['UserController'] = function ($container) {
	return new \App\Controllers\UserController();
};




?>