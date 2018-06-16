<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;


class HomeController extends Controller {

	public function index($request, $response) {
		
        //$users = $this->db->table('users')->find(1);
		//$users = User::where('email', 'y_yammy@hotmail.com')->first();
		
		/*User::create([
			'name' => 'webblogme',
			'email' => 'allyouneedforweb@gmail.com',
			'password' => '123',
		]);*/
		
		
		//var_dump($users);
		//die();

		//print("<pre>"); var_dump($users); print("</pre>");
		
		return $this->container->view->render($response, 'home.twig.php');
	}

}

?>