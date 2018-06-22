<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model {
	
	protected $table = 'data';
	protected $fillable = ['ip','action','loginfo',,'mailinfo'];
	
	public function setPassword() {
		$this->update(['password'=> password_hash($password, PASSWORD_DEFAULT)]);
	}
	
}

?>