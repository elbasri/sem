<?php
App::uses('AppController', 'Controller');

class EvennementsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Evennement');
	public $paginate= array('limit'=>'50','order'=>array('Evennement.id'=>'asc'));
	public $paginatedesc= array('limit'=>'50','order'=>array('Evennement.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
			if($user['role']=='admin')
				return true;
			else{
				return false;
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				}
		return parent::isAuthorized($user);
	}
	
	public function index(){
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginatedesc;
	if($this->Session->read('tri')=='asc')
		$this->Paginator->settings=$this->paginate;
		
		if($this->Session->read('lang')=='ar'){
			$this->set('current_icon','icons/layout_edit.png');
			$this->set('current_controller','evennements');
			$this->set('current_controllername','الأحداث');
			$this->set('current_iconview','icons/page_white_text_width.png');
			$this->set('current_view','evennements');
			$this->set('current_iconviewname','أحداث النظام');
			$this->set('title_for_layout',"أحداث النظام");
		} else if($this->Session->read('lang')=='en'){
			$this->set('current_icon','icons/layout_edit.png');
			$this->set('current_controller','evennements');
			$this->set('current_controllername','events');
			$this->set('current_iconview','icons/page_white_text_width.png');
			$this->set('current_view','evennements');
			$this->set('current_iconviewname','System events');
			$this->set('title_for_layout',"System events");
		}else{
			$this->set('current_icon','icons/layout_edit.png');
			$this->set('current_controller','evennements');
			$this->set('current_controllername','evennements');
			$this->set('current_iconview','icons/page_white_text_width.png');
			$this->set('current_view','evennements');
			$this->set('current_iconviewname','evennements du système');
			$this->set('title_for_layout',"evennements du système");
		}
	$post=$this->Paginator->paginate('Evennement');
		$this->set(compact('post'));
		
	/*if($this->Session->read('lang')=='ar'){
		$this->render('ar/index');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/index');
		}*/
	}
	public function triasc($id=null){
		$this->Session->write('tri','asc');
		$this->redirect(array('action'=>'index'));
	}
	public function tridesc($id=null){
		$this->Session->write('tri','desc');
		$this->redirect(array('action'=>'index'));
	}

} // fin de "appcontroller"
?>