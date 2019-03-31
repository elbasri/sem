<?php
App::uses('AppController', 'Controller');

class DeplacementsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Deplacement','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Deplacement.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Deplacement.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Deplacements']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Deplacement->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typedéplacement')=='personnelle'){
		$post=$this->Paginator->paginate('Deplacement',array('type '=>'personnelle'));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement ');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','deplacements/personnelle');
			$this->set('current_iconviewname','personnelle');
			$this->set('title_for_layout','personnelle');
	}
	else if($this->Session->read('typedéplacement')=='professionnelle'){
		$post=$this->Paginator->paginate('Deplacement',array('type '=>'professionnelle'));
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement ');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','deplacements/professionnelle');
			$this->set('current_iconviewname','professionnelle');
			$this->set('title_for_layout','professionnelle');
	}
	else{
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','deplacements/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Deplacement');
		}
	$this->set(compact('post'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}

	}
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste de déplacement");
	$this->layout = 'imprimer';
	if($this->Session->read('typedéplacement')=='professionnelle'){
		$post=$this->Deplacement->find('all',array('conditions'=>array('type '=>'professionnelle')));
	}
	else if($this->Session->read('typedéplacement')=='personnelle'){
		$post=$this->Deplacement->find('all',array('conditions'=>array('type '=>'personnelle')));
	}
	else
		$post=$this->Deplacement->find('all');
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعى قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Indemnités de déplacement";
				$this->request->data['Evennement']['logicielar']="تنقلات";
				$this->request->data['Evennement']['logicielen']="Travel Allowances";
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
	
	public function personnelle($id=null){
		$this->Session->write('typedéplacement','personnelle');
		$this->redirect(array('action'=>'admin'));
	}
	public function professionnelle($id=null){
		$this->Session->write('typedéplacement','professionnelle');
		$this->redirect(array('action'=>'admin'));
	}
	/*
	public function t($id=null){
		$this->Session->write('typedéplacement','t');
		$this->redirect(array('action'=>'admin'));
	}
	public function e($id=null){
		$this->Session->write('typedéplacement','e');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typedéplacement','a');
		$this->redirect(array('action'=>'admin'));
	}*/
	public function tout($id=null){
		$this->Session->write('typedéplacement','tout');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function view($id=null,$titre=null){
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','deplacements/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Deplacement: '.$titre);
			$this->set('title_for_layout',"déplacement: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Deplacement->findById($id);
		if($post){
		$titredetest=$post['Deplacement']['ref'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Deplacement->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Deplacement->findById($id);
			if($post){
				$this->set('title_for_layout',$post['Deplacement']['ref']);
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
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','deplacements/add');
			$this->set('current_iconviewname','Ajouter une déplacement');
			$this->set('title_for_layout',"Ajouter une déplacement");
	$this->layout = 'admin';
	
		if($this->request->is('Post'))
		{
			$dated=new DateTime($this->request->data['Deplacement']['dated']['year']."-".$this->request->data['Deplacement']['dated']['month']."-".$this->request->data['Deplacement']['dated']['day']);
			$datef=new DateTime($this->request->data['Deplacement']['datef']['year']."-".$this->request->data['Deplacement']['datef']['month']."-".$this->request->data['Deplacement']['datef']['day']);
			//$days=$datef-$dated;
			
			$days = $datef->diff($dated)->format("%a");
			$days++;
			$this->request->data['Deplacement']['total']=$days*$this->request->data['Deplacement']['taux'];
			//$this->request->data['Deplacement']['total']=$days;
			
			$this->request->data['Deplacement']['user_id'] = $this->Auth->User('id');
			if($this->Deplacement->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Indemnités de déplacement";
				$this->request->data['Evennement']['logicielar']="تنقلات";
				$this->request->data['Evennement']['logicielen']="Travel Allowances";
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
		if($this->Deplacement->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Indemnités de déplacement";
				$this->request->data['Evennement']['logicielar']="تنقلات";
				$this->request->data['Evennement']['logicielen']="Travel Allowances";
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
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','deplacements/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'une déplacement');
			$this->set('title_for_layout',"Modification d'une déplacement");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Deplacement->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide déplacement'));
		$this->Deplacement->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			
			}
		else{
			$dated=new DateTime($this->request->data['Deplacement']['dated']['year']."-".$this->request->data['Deplacement']['dated']['month']."-".$this->request->data['Deplacement']['dated']['day']);
			$datef=new DateTime($this->request->data['Deplacement']['datef']['year']."-".$this->request->data['Deplacement']['datef']['month']."-".$this->request->data['Deplacement']['datef']['day']);
			//$days=$datef-$dated;
			
			$days = $datef->diff($dated)->format("%a");
			$days++;
			$this->request->data['Deplacement']['total']=$days*$this->request->data['Deplacement']['taux'];
			
			if($this->Deplacement->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Indemnités de déplacement";
				$this->request->data['Evennement']['logicielar']="تنقلات";
				$this->request->data['Evennement']['logicielen']="Travel Allowances";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
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
			$this->set('current_icon','icons/calculator.png');
			$this->set('current_controller','deplacements/tout');
			$this->set('current_controllername','Frais de déplacement: Indemnités de déplacement');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','deplacements/recherche');
			$this->set('current_iconviewname','Recherche de déplacements');
			$this->set('title_for_layout',"Recherche de déplacements");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '3')
				$realisation=$this->Deplacement->find('all',array('conditions'=>array('Deplacement.ref='.$this->request->data['Deplacement']['refe'])));
			if($_POST['rechercher'] == '1')
				$realisation=$this->Deplacement->find('all',array('conditions'=>array('Deplacement.id='.$this->request->data['Deplacement']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Deplacement']['dated']['year']."-".$this->request->data['Deplacement']['dated']['month']."-".$this->request->data['Deplacement']['dated']['day'];
			$datef=$this->request->data['Deplacement']['datef']['year']."-".$this->request->data['Deplacement']['datef']['month']."-".$this->request->data['Deplacement']['datef']['day'];
			
			$conditions = array('Deplacement.date <=' => $datef, 'Deplacement.date >=' => $dated);
			$realisation=$this->Deplacement->find('all', array('conditions' => $conditions));
				//$realisation=$this->Deplacement->find('all',array('conditions'=>array('Deplacement.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Deplacement->findById($id);
		if($post){
			//$post=$this->Deplacement->findById($id);
			if($post){
				$this->set('title_for_layout',"déplacement: ".$post['Deplacement']['ref']);
				$this->set('post',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Indemnités de déplacement";
				$this->request->data['Evennement']['logicielar']="تنقلات";
				$this->request->data['Evennement']['logicielen']="Travel Allowances";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
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
} // fin de "appcontroller"
?>