<?php

namespace App\Validation;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator {

	protected $errors;
	
	public function validate($request, array $rules) {
		
		//var_dump($rules);die();
			
			foreach ($rules as $field => $rule) {
			
			try {
				
				$rule->setName(ucfirst($field))->assert($request->getParam($field));
				
			} catch (NestedValidationException $e) {
				
				$this->errors[$field] = $e->getMessages();

			}

		}
		
		//var_dump($this->errors);die();
		
		$_SESSION['errors'] = $this->errors;
		
		return $this;

	}
	
	public function failed() {
		
		return !empty($this->errors);
		
	}

}

?>