<?php 


// Fetch DI Container
$container = $app->getContainer();

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