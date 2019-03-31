<?php
App::uses('AppController', 'Controller');

class AgendasController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Agenda','Client','Materiel','Produit','Service','Devise','Commande','Facture');
	public $paginate= array('limit'=>'10','order'=>array('Agenda.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Agenda.id'=>'desc'));
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['agendas']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Agenda->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typeagenda')=='t'){
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','agendas/a');
			$this->set('current_iconviewname','Términés');
			$this->set('title_for_layout',"Términés");
		$post=$this->Paginator->paginate('Agenda',array('date <'=>$date));
		}
	else if($this->Session->read('typeagenda')=='a'){
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','agendas/e');
			$this->set('current_iconviewname','A venir');
			$this->set('title_for_layout',"A venir");
		$post=$this->Paginator->paginate('Agenda',array('date >='=>$date));
		}
	else{
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','agendas/admin');
			$this->set('current_iconviewname','Rendez-vous');
			$this->set('title_for_layout',"Rendez-vous");
		$post=$this->Paginator->paginate('Agenda');
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
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','agendas/view/'.$id."/".$titre);
			$this->set('current_iconviewname','Agenda: '.$titre);
			$this->set('title_for_layout',"Agenda: ".$titre);
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Agenda->findById($id);
		if($post){
		$titredetest=$post['Agenda']['ref'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Agenda->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Agenda->findById($id);
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
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','agendas/add');
			$this->set('current_iconviewname','Ajouter un rendez-vous');
			$this->set('title_for_layout',"Ajouter un rendez-vous");
	$this->layout = 'admin';
	$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.ref')));
	$produits = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.ref')));
	$services = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.ref')));
	$devis = $this->Devise->find('list', array('fields'=> array('Devise.id', 'Devise.reference')));
	$commandes = $this->Commande->find('list', array('fields'=> array('Commande.id', 'Commande.reference')));
	$factures = $this->Facture->find('list', array('fields'=> array('Facture.id', 'Facture.reference')));
	$clients = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.ref')));
	$this->set(compact('stock','produits','services','devis','commandes','factures','clients'));
		if($this->request->is('Post'))
		{
			$this->Agenda->create();
			$employe=$this->Client->findById($this->request->data['Agenda']['client_id']);
			$this->request->data['Agenda']['client_nom'] = $employe['Client']['nom'];
			
			if($this->request->data['Agenda']['typep']=="Article du stock"){
				$employe=$this->Materiel->findById($this->request->data['Agenda']['projet_ida']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_ida'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Materiel']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Produit du site web"){
				$employe=$this->Produit->findById($this->request->data['Agenda']['projet_idp']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idp'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Produit']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Service du site web"){
				$employe=$this->Service->findById($this->request->data['Agenda']['projet_ids']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_ids'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Service']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Devis"){
				$employe=$this->Devise->findById($this->request->data['Agenda']['projet_idd']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idd'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Devise']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Commande"){
				$employe=$this->Commande->findById($this->request->data['Agenda']['projet_idc']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idc'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Commande']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Facture"){
				$employe=$this->Facture->findById($this->request->data['Agenda']['projet_idf']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idf'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Facture']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Autre"){
				//$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idl'];
				$this->request->data['Agenda']['projet_nom'] = $this->request->data['Agenda']['projet_idl'];
				}
			
			$this->request->data['Agenda']['user_id'] = $this->Auth->User('id');
			if($this->Agenda->save($this->request->data)){
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
		if($this->Agenda->delete($id)){
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
	}
	public function modifier($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','agendas/modifier/'.$id);
			$this->set('current_iconviewname','Modification d\'un rendez-vous');
			$this->set('title_for_layout',"Modification d'un rendez-vous");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Agenda->findById($id);
		if(!$post)
			throw new NotFoundException($this->notfoundmessage);
		$this->Agenda->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			
	$stock = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.ref')));
	$produits = $this->Produit->find('list', array('fields'=> array('Produit.id', 'Produit.ref')));
	$services = $this->Service->find('list', array('fields'=> array('Service.id', 'Service.ref')));
	$devis = $this->Devise->find('list', array('fields'=> array('Devise.id', 'Devise.reference')));
	$commandes = $this->Commande->find('list', array('fields'=> array('Commande.id', 'Commande.reference')));
	$factures = $this->Facture->find('list', array('fields'=> array('Facture.id', 'Facture.reference')));
	$clients = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.ref')));
	$this->set(compact('stock','produits','services','devis','commandes','factures','clients'));
			}
		else {
			$employe=$this->Client->findById($this->request->data['Agenda']['client_id']);
			$this->request->data['Agenda']['client_nom'] = $employe['Client']['nom'];
			
			if($this->request->data['Agenda']['typep']=="Article du stock"){
				$employe=$this->Materiel->findById($this->request->data['Agenda']['projet_ida']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_ida'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Materiel']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Produit du site web"){
				$employe=$this->Produit->findById($this->request->data['Agenda']['projet_idp']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idp'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Produit']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Service du site web"){
				$employe=$this->Service->findById($this->request->data['Agenda']['projet_ids']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_ids'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Service']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Devis"){
				$employe=$this->Devise->findById($this->request->data['Agenda']['projet_idd']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idd'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Devise']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Commande"){
				$employe=$this->Commande->findById($this->request->data['Agenda']['projet_idc']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idc'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Commande']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Facture"){
				$employe=$this->Facture->findById($this->request->data['Agenda']['projet_idf']);
				$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idf'];
				$this->request->data['Agenda']['projet_nom'] = $employe['Facture']['nom'];
				}
			else if($this->request->data['Agenda']['typep']=="Autre"){
				//$this->request->data['Agenda']['projet_id'] = $this->request->data['Agenda']['projet_idl'];
				$this->request->data['Agenda']['projet_nom'] = $this->request->data['Agenda']['projet_idl'];
				}
				
			if($this->Agenda->save($this->request->data)){
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
			$this->set('current_icon','icons/hourglass.png');
			$this->set('current_controller','agendas/tout');
			$this->set('current_controllername','CRM: Agendas');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','agendas/recherche');
			$this->set('current_iconviewname','Recherche de rendez-vous');
			$this->set('title_for_layout',"Recherche de rendez-vous");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			if($_POST['rechercher'] == '1')
				$realisation=$this->Agenda->find('all',array('conditions'=>array('Agenda.id='.$this->request->data['Agenda']['ide'])));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Agenda']['dated']['year']."-".$this->request->data['Agenda']['dated']['month']."-".$this->request->data['Agenda']['dated']['day'];
			$datef=$this->request->data['Agenda']['datef']['year']."-".$this->request->data['Agenda']['datef']['month']."-".$this->request->data['Agenda']['datef']['day'];
			
			$conditions = array('Agenda.date <=' => $datef, 'Agenda.date >=' => $dated);
			$realisation=$this->Agenda->find('all', array('conditions' => $conditions));
				//$realisation=$this->Agenda->find('all',array('conditions'=>array('Agenda.jusqua BETWEEN '.$dated.' AND '.$datef)));
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
		$post=$this->Agenda->findById($id);
		if($post){
			//$post=$this->Agenda->findById($id);
			if($post){
				$this->set('title_for_layout',"Rendez-vous");
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
	$this->set('title_for_layout',"Liste de rendez-vous");
	$this->layout = 'imprimer';
	$date=date('Y-m-d');
	if($this->Session->read('typeagenda')=='t')
		$post=$this->Agenda->find('all',array('conditions'=>array('date <='=>$date)));
	else if($this->Session->read('typeagenda')=='a')
		$post=$this->Agenda->find('all',array('conditions'=>array('date >'=>$date)));
	else
		$post=$this->Agenda->find('all');
		$this->set(compact('post'));
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
	public function tout($id=null){
		$this->Session->write('typeagenda','tout');
		$this->redirect(array('action'=>'admin'));
	}
	public function a($id=null){
		$this->Session->write('typeagenda','a');
		$this->redirect(array('action'=>'admin'));
	}
	public function t($id=null){
		$this->Session->write('typeagenda','t');
		$this->redirect(array('action'=>'admin'));
	}
	
} // fin de "appcontroller"
?>