<?php 

use Respect\Validation\Validator as v;


// Fetch DI Container
$container = $app->getContainer();


// DATABASE
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
	return $capsule;
};

/*$container['data'] = function ($container) use ($capsule) {
	return $capsule;
};*/

$container['auth'] = function ($container) {
	return new \App\Auth\Auth;
};

$container['flash'] = function ($container) {
	return new \Slim\Flash\Messages;
};


// Instantiate and add Slim specific extension
//$router = $c->get('router');
//$uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
//$twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));


// TWIG
$container['view'] = function ($container) {
    
	$view = new \Slim\Views\Twig(__DIR__ . '/../resources', [
		'cache' => false,
		'debug' => true,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));
	
	$view->getEnvironment()->addGlobal('auth', [
	
		'check' => $container->auth->check(),
		'user' => $container->auth->user(),
	
	]);
	
	$view->getEnvironment()->addGlobal('flash',  $container->flash);
	
	$view->addExtension(new Twig_Extension_Debug());
	$view->addExtension(new Twig_Extensions_Extension_Text());
	
    return $view;
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

$container['validator'] = function ($container) {
	return new \App\Validation\Validator($container);
};

$container['HomeController'] = function ($container) {
	return new \App\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container) {
	return new \App\Controllers\Auth\AuthController($container);
};

$container['PasswordController'] = function ($container) {
	return new \App\Controllers\Auth\PasswordController($container);
};

$container['csrf'] = function ($container) {
	return new \Slim\Csrf\Guard;
};



$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldinputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));

$app->add($container->csrf);

v::with('App\\Validation\\Rules\\');

/*$container['UserController'] = function ($c) {
	return new \App\Controllers\UserController();
};*/




?>