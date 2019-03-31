<?php
App::uses('AppController', 'Controller');

class ConfigurationsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Configuration','Consultation','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Configuration.id'=>'asc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Configurations']!=='1')
		return false;
	else if(in_array($this->action,array('index'))){
			if($user['role']=='admin')
				return true;
			else{
				return false;
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				}
		}
		return parent::isAuthorized($user);
	}
	
	public function index(){
	
	$this->layout = 'admin';
		if($this->Session->read('lang')=='ar'){ 
			$this->set('current_icon','icons/wrench_orange.png');
			$this->set('current_controller','configurations');
			$this->set('current_controllername','الإعدادات');
			$this->set('current_iconview','icons/wrench.png');
			$this->set('current_view','configurations');
			$this->set('current_iconviewname','إعدادات النظام');
			$this->set('title_for_layout',"إعدادات النظام");
		} else if($this->Session->read('lang')=='en'){ 
			$this->set('current_icon','icons/wrench_orange.png');
			$this->set('current_controller','configurations');
			$this->set('current_controllername','Configurations');
			$this->set('current_iconview','icons/wrench.png');
			$this->set('current_view','configurations');
			$this->set('current_iconviewname','System configuration');
			$this->set('title_for_layout',"System configuration");
		}else{
			$this->set('current_icon','icons/wrench_orange.png');
			$this->set('current_controller','configurations');
			$this->set('current_controllername','Configurations');
			$this->set('current_iconview','icons/wrench.png');
			$this->set('current_view','configurations');
			$this->set('current_iconviewname','Configuration du système');
			$this->set('title_for_layout',"Configuration du système");
		}
			
		$post=$this->Configuration->findById(1);
		if(!$post)
			throw new NotFoundException(_('Invalide Configuration'));
		$this->Configuration->id=1;
		
		if(!$this->request->data){
			$this->request->data=$post;
			}
		else if($this->Configuration->save($this->request->data)){
				$this->Consultation->id=1;
				$this->Consultation->saveField('titre',$this->request->data['Configuration']['quitext']);
				$this->Consultation->saveField('titrear',$this->request->data['Configuration']['quitextar']);
				$this->Consultation->saveField('titreen',$this->request->data['Configuration']['quitexten']);
				$this->Consultation->id=2;
				$this->Consultation->saveField('titre',$this->request->data['Configuration']['pourtext']);
				$this->Consultation->saveField('titrear',$this->request->data['Configuration']['pourtextar']);
				$this->Consultation->saveField('titreen',$this->request->data['Configuration']['pourtexten']);
				if($this->Session->read('lang')=='ar'){ 
					$this->Session->setFlash('تم تطبيق الإعدادت بنجاح');
				} else if($this->Session->read('lang')=='en'){ 
					$this->Session->setFlash('Configurations saved successfully');
				}else{
					$this->Session->setFlash('Les Configurations ont été bien enregistrer');
				}
				
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier les configurations";
				$this->request->data['Evennement']['titrear']="تعديل الإعدادات";
				$this->request->data['Evennement']['titreen']="Edit the configurations";
				$this->request->data['Evennement']['logiciel']="Configuration";
				$this->request->data['Evennement']['logicielar']="الإعدادات";
				$this->request->data['Evennement']['logicielen']="Configuration";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				return $this->redirect(array('action'=>'index'));
			}
	}

} // fin de "appcontroller"
?>