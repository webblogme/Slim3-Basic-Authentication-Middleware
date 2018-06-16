<?php

namespace App\Controllers;

use Slim\Views\Twig as View;


class HomeController extends Controller {

	public function index($request, $response) {
		
        $article = $this->db->table('article')->find(1);
		
		var_dump($article->summary);

		print("<pre>"); print_r($article); print("</pre>");
		
		return $this->container->view->render($response, 'home2.twig.php');
	}

}

?>