<?php

namespace App\Middleware;

class OldinputMiddleware extends Middleware {
	
	public function __invoke($request, $response, $next) {
		
		//var_dump('Middleware');
		
		$this->container->view->getEnvironment()->addGlobal('old',$_SESSION['old']);
		
		$_SESSION['old'] = $request->getParams();
		
		$response = $next($request, $response);
		
		return $response;

	}

}

?>