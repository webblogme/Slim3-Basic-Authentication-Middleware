<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller {

	public function getSignOut($request, $response) {

		$this->auth->logout();
		
		return $response->withRedirect($this->router->pathFor('home'));
		
	}
	
	public function getSignIn($request, $response) {

		return $this->view->render($response, 'auth/signin.twig.php');
		
	}
	
	public function postSignIn($request, $response) {
		
		$auth = $this->auth->attempt(
		
			$request->getParam('email'),
			$request->getParam('password')

		);
		
		if(!$auth) {
			
			return $response->withRedirect($this->router->pathFor('auth.signin'));
			
		}
		
		return $response->withRedirect($this->router->pathFor('home'));
		
	}

	public function getSignUp($request, $response) {

		return $this->view->render($response, 'auth/signup.twig.php');
		
	}
	
	public function postSignUp($request, $response) {
		
		//var_dump($request->getParams());die();
		
		$validation = $this->validator->validate($request, [

			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'name' => v::noWhitespace()->notEmpty()->alpha(),
			'password' => v::noWhitespace()->notEmpty(),

		]);
		
		if($validation->failed()) {

			return $response->withRedirect($this->router->pathFor('auth.signup'));

		}
		
		//SEE 'MODELS' IF INSERT NOT SUCCESSFUL
		$user = User::create([
			'email' => $request->getParam('email'),
			'name' => $request->getParam('name'),
			'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
		]);
		
		//if ($user->exists) { echo 555; }
		//var_dump($user);die();
		
		// IMMEDIATELY LOGIN WHEN SIGN UP
		$this->auth->attempt($user->email,$request->getParam('password'));

		return $response->withRedirect($this->router->pathFor('home'));
		
	}

}

?>