<?php 


// Fetch DI Container
$container = $app->getContainer();


// Service factory for the ORM
$container['db'] = function ($container) {
	
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};




//https://www.youtube.com/watch?v=70IkLMkPyPs






// Register Twig View helper
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






 ?>