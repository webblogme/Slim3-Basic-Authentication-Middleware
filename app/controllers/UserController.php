<?php 

namespace App\Controllers;

class UserController {
	
	public function home($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
		
		$response='home';
		
        return $response;
	}

	public function contact($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
		$response='contact';
		
        return $response;
	}
	
	
}


?>