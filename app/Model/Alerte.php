<?php

class Alerte extends AppModel{
	//public $name='Post';
	public $validate = array(
	
	);
	
	public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
}
?>