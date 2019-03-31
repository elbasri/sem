<?php
class Evennement extends AppModel{
 public $validate =array(
		);
 public function isOwnedBy($postId,$user){
		return $this->field('id', array('id'=>$postId,'user_id'=>$user)) !== false;
	}
 
}

?>