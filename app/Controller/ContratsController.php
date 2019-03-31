<?php
App::uses('AppController', 'Controller');

class ContratsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Contrat','Client','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Contrat.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Contrat.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Contrats']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Contrat->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
	
	public function admin(){
	$this->layout = 'admin';
		$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	$date=date('Y-m-d');
	if($this->Session->read('typecontrat')=='t'){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/t');
			$this->set('current_iconviewname','Contrats expirés');
			$this->set('title_for_layout',"Contrats expirés");
		$post=$this->Paginator->paginate('Contrat',array('datef <'=>$date));
		}
	else if($this->Session->read('typecontrat')=='e'){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/e');
			$this->set('current_iconviewname','Contrats valides');
			$this->set('title_for_layout',"Contrats valides");
		$post=$this->Paginator->paginate('Contrat',array('datef >='=>$date));
		}
	else if($this->Session->read('typecontrat')=='contratg'){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/contratg');
			$this->set('current_iconviewname','Contrats de garantie');
			$this->set('title_for_layout',"Contrats de garantie");
		$post=$this->Paginator->paginate('Contrat',array('type'=>'Garantie'));
		}
	else if($this->Session->read('typecontrat')=='contratm'){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/contratm');
			$this->set('current_iconviewname','Contrats de maintenance');
			$this->set('title_for_layout',"Contrats de maintenance");
		$post=$this->Paginator->paginate('Contrat',array('type'=>'Maintenance'));
		}
	else if($this->Session->read('typecontrat')=='contrata'){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/contrata');
			$this->set('current_iconviewname','Contrats d\'assurance');
			$this->set('title_for_layout',"Contrats d'assurance");
		$post=$this->Paginator->paginate('Contrat',array('type'=>'Assurance'));
		}
	else if($this->Session->read('typecontrat')=='contratl'){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/contratl');
			$this->set('current_iconviewname','Contrats de location');
			$this->set('title_for_layout',"Contrats de location");
		$post=$this->Paginator->paginate('Contrat',array('type'=>'Location'));
		}
	else{
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','contrats/admin');
			$this->set('current_iconviewname','Contrats');
			$this->set('title_for_layout',"Contrats");
		$post=$this->Paginator->paginate('Contrat');
		}
		
		$this->set(compact('post'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}

	}
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','contrats/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Contrat: '.$titre);
			$this->set('title_for_layout',"Contrats: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Contrat->findById($id);
		if($post){
		$titredetest=$post['Contrat']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Contrat->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Contrat->findById($id);
			if($post){ 
				$this->set('post',$post);
				}
				else
				throw new NotFoundException($this->notfoundmessage);
			}
		else{
			throw new NotFoundException($this->notfoundmessage);
			}
		}else{
			throw new NotFoundException($this->notfoundmessage);
			}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/view');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/view');
		}

	}
	public function add(){
	if($this->Session->read('Auth.User.add')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','contrats/add');
			$this->set('current_iconviewname','Ajouter une contrat');
			$this->set('title_for_layout',"Ajouter une contrat");
	$this->layout = 'admin';
	$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'conditions'=>array('type <> "client"')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$this->Contrat->create();
			$employe=$this->Client->findById($this->request->data['Contrat']['client_id']);
			$this->request->data['Contrat']['client_nom'] = $employe['Client']['nom'];
			$this->request->data['Contrat']['user_id'] = $this->Auth->User('id');
			if($this->Contrat->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Contrats";
				$this->request->data['Evennement']['logicielar']="عقود";
				$this->request->data['Evennement']['logicielen']="Contracts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'admin'));
			}
			//throw new NotFoundException(_('Erreur:'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/add');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/add');
		}

	}
	public function supprimer($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		if($this->Contrat->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Contrats";
				$this->request->data['Evennement']['logicielar']="عقود";
				$this->request->data['Evennement']['logicielen']="Contracts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	public function modifier($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','contrats/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'une contrat');
			$this->set('title_for_layout',"Modification d'une contrat");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Contrat->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Contrat'));
		$this->Contrat->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			$options = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom')));
			$this->set(compact('options'));
			}
		else {
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modification";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Contrats";
				$this->request->data['Evennement']['logicielar']="عقود";
				$this->request->data['Evennement']['logicielen']="Contracts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$employe=$this->Client->findById($this->request->data['Contrat']['client_id']);
			$this->request->data['Contrat']['client_nom'] = $employe['Client']['nom'];
			if($this->Contrat->save($this->request->data)){
				$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'admin'));
				}
			}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/modifier');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/modifier');
		}

	}
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			$this->set('current_icon','icons/page_white_paste.png');
			$this->set('current_controller','contrats/tout');
			$this->set('current_controllername','CRM: Contrats');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','contrats/recherche');
			$this->set('current_iconviewname','Recherche de contrats');
			$this->set('title_for_layout',"Recherche de contrats");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Contrat->find('all',array('conditions'=>array('Contrat.id='.$this->request->data['Contrat']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Contrat']['dated']['year']."-".$this->request->data['Contrat']['dated']['month']."-".$this->request->data['Contrat']['dated']['day'];
			$datef=$this->request->data['Contrat']['datef']['year']."-".$this->request->data['Contrat']['datef']['month']."-".$this->request->data['Contrat']['datef']['day'];
			
			$conditions = array('Contrat.datef <=' => $datef, 'Contrat.datef >=' => $dated);
			$realisation=$this->Contrat->find('all', array('conditions' => $conditions));
				//$realisation=$this->Contrat->find('all',array('conditions'=>array('Contrat.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			$this->set(compact('realisation', 'test'));
		}
		if($test==0)
			$this->set(compact('test'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/recherche');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/recherche');
		}

	}
	public function imprimer($id=null,$pdf=null){
	if($this->Session->read('Auth.User.imprimer')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Contrat->findById($id);
		if($post){
			//$post=$this->Contrat->findById($id);
			if($post){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Contrats";
				$this->request->data['Evennement']['logicielar']="عقود";
				$this->request->data['Evennement']['logicielen']="Contracts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->set('title_for_layout',"Contrat");
				$this->set('post',$post);
				if($pdf=="pdf"){
						$name=$this->request->params['controller']."_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
						$this->Mpdf->SetWatermarkText("Draft");
						}
				}
				else
				throw new NotFoundException($this->notfoundmessage);
		}else{
			throw new NotFoundException($this->notfoundmessage);
			}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimer');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimer');
		}

	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de contrats");
	$this->layout = 'imprimer';
	$date=date('Y-m-d');
	if($this->Session->read('typecontrat')=='t')
		$post=$this->Contrat->find('all',array('conditions'=>array('datef <='=>$date)));
	else if($this->Session->read('typecontrat')=='e')
		$post=$this->Contrat->find('all',array('conditions'=>array('datef >'=>$date)));
	else if($this->Session->read('typecontrat')=='contratg')
		$post=$this->Contrat->find('all',array('conditions'=>array('type'=>'Garantie')));
	else if($this->Session->read('typecontrat')=='contratm')
		$post=$this->Contrat->find('all',array('conditions'=>array('type'=>'Maintenance')));
	else if($this->Session->read('typecontrat')=='contrata')
		$post=$this->Contrat->find('all',array('conditions'=>array('type'=>'Assurance')));
	else if($this->Session->read('typecontrat')=='contratl')
		$post=$this->Contrat->find('all',array('conditions'=>array('type'=>'Location')));
	else
		$post=$this->Contrat->find('all');
		$this->set(compact('post'));
		
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Contrats";
				$this->request->data['Evennement']['logicielar']="عقود";
				$this->request->data['Evennement']['logicielen']="Contracts";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
		 if($pdf=="pdf"){
						$name=$this->request->params['controller']."_liste_".md5(time());
						$this->layout = 'imprimerpdf';
						$this->Mpdf->init();
						$this->Mpdf->setFilename($name.'.pdf');
						$this->Mpdf->setOutput('D');
						$this->Mpdf->SetWatermarkText("Draft");
						}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimerliste');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimerliste');
		}

	}
	public function triasc($id=null){
		$this->Session->write('tri','asc');
		$this->redirect(array('action'=>'admin'));
	}
	public function tridesc($id=null){
		$this->Session->write('tri','desc');
		$this->redirect(array('action'=>'admin'));
	}
	public function contratg($id=null){
		$this->Session->write('typecontrat','contratg');
		$this->redirect(array('action'=>'admin'));
	}
	public function contratm($id=null){
		$this->Session->write('typecontrat','contratm');
		$this->redirect(array('action'=>'admin'));
	}
	public function contrata($id=null){
		$this->Session->write('typecontrat','contrata');
		$this->redirect(array('action'=>'admin'));
	}
	public function contratl($id=null){
		$this->Session->write('typecontrat','contratl');
		$this->redirect(array('action'=>'admin'));
	}
	public function tout($id=null){
		$this->Session->write('typecontrat','tout');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typecontrat','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function t($id=null){
		$this->Session->write('typecontrat','t');
		$this->redirect(array('action'=>'admin'));
	}
	
} // fin de "appcontroller"
?>