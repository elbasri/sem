<?php
App::uses('AppController', 'Controller');

class ImpressionsController extends AppController{
	public $helpers = array('Html', 'Form');
	//public $uses = array('Maintenance','Materiel');
	//public $components = array('DebugKit.Toolbar');
	
	public function isAuthorized($user){
		if($user['limites']!=='0' && $user['limites']!=='1' && $user['Impressions']!=='1')
				return false;
		return parent::isAuthorized($user);
	}
	
	public function index(){
	$this->layout = 'admin';
				$this->set('current_icon','icons/page_white_acrobat.png');
				$this->set('current_controller','impressions');
				$this->set('current_controllername','Impressions');
				$this->set('current_iconview','icons/printer.png');
				$this->set('current_view','impressions');
				$this->set('current_iconviewname',"Rapports / Impressions");
				$this->set('title_for_layout',"Rapports / Impressions");
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/index');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/index');
		}

	}
} // fin de "appcontroller"
?>