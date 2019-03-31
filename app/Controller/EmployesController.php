<?php
App::uses('AppController', 'Controller');

class EmployesController extends AppController{
	public $helpers=array('Html','Form');
	public $uses=array('Employe','Specialite','Evennement');
	public $paginate= array('limit'=>'10','order'=>array('Employe.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Employe.id'=>'desc'));
	
	public function beforeFilter(){
		parent::beforeFilter();
		/*if (!isset($$this->Auth)) {
            debug(get_included_files());
            die;
        }*/
		//$this->Auth->allow('admin');
	}
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Employes']!=='1')
		return false;
	else if(in_array($this->action,array('edit','delete'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Employe->isOwnedBy($postId,$user['id']))
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
	if($this->Session->read('typeempoye')=='mauvais'){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/excellent');
			$this->set('current_iconviewname','Employés notés mauvais');
			$this->set('title_for_layout',"Employés notés mauvais");
		$users=$this->Paginator->paginate('Employe',array('noter'=>'mauvais'));
		}
	else if($this->Session->read('typeempoye')=='moyenne'){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/excellent');
			$this->set('current_iconviewname','Employés notés moyenne');
			$this->set('title_for_layout',"Employés notés moyenne");
		$users=$this->Paginator->paginate('Employe',array('noter'=>'moyenne'));
		}
	else if($this->Session->read('typeempoye')=='bien'){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/excellent');
			$this->set('current_iconviewname','Employés notés bien');
			$this->set('title_for_layout',"Employés notés bien");
		$users=$this->Paginator->paginate('Employe',array('noter'=>'bien'));
		}
	else if($this->Session->read('typeempoye')=='excellent'){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/excellent');
			$this->set('current_iconviewname','Employés notés excellent');
			$this->set('title_for_layout',"Employés notés excellen");
		$users=$this->Paginator->paginate('Employe',array('noter'=>'excellent'));
		}
	else if($this->Session->read('typeempoye')=='cin'){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/cin');
			$this->set('current_iconviewname','CIN expirés');
			$this->set('title_for_layout',"CIN expirés");
		$users=$this->Paginator->paginate('Employe',array('cinend <'=>$date));
		}
	else if($this->Session->read('typeempoye')=='contrats'){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/contrats');
			$this->set('current_iconviewname','Contrats expirés');
			$this->set('title_for_layout',"Contrats expirés");
		$users=$this->Paginator->paginate('Employe',array('datefintravail <'=>$date));
		}
	else{
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/admin.png');
			$this->set('current_view','employes/admin');
			$this->set('current_iconviewname','Administration');
			$this->set('title_for_layout',"Administration");
		$users=$this->Paginator->paginate('Employe');
		}
			
		$this->set(compact('users'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/admin');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/admin');
		}

	}
	
	public function view($id=null,$nom=null){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/afficher.png');
			$this->set('current_view','employes/view/'.$id."/".$nom);
			$this->set('current_iconviewname','Employé: '.$nom);
			$this->set('title_for_layout','Employé: '.$nom);
	$this->layout = 'admin';
		if(!$id || !$nom){
			$this->Session->setFlash($this->notfoundmessage);
		}
		else{
			$user=$this->Employe->findById($id);
			if($user){
				//$user=$this->Employe->findById($id);
				$nomx=Inflector::slug($user['Employe']['nom'],$remplacement='_');
				if($nom=$nomx){
					$this->set('user',$this->Employe->read(null,$id));
					$this->set('title_for_layout',$user['Employe']['nom']." ".$user['Employe']['prenom']);
				}
				else
					$this->Session->setFlash($this->notfoundmessage);
			}
			else
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
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','employes/add');
			$this->set('current_iconviewname','Ajouter un employé');
			$this->set('title_for_layout',"Ajouter un employé");
	$this->layout='admin';
	$options = $this->Specialite->find('list', array('fields'=> array('Specialite.id', 'Specialite.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post')){
		
			$this->Employe->create();
			$employe=$this->Specialite->findById($this->request->data['Employe']['specialite_id']);
			$this->request->data['Employe']['specialite'] = $employe['Specialite']['nom'];
			$this->request->data['Employe']['noter'] = "excellent";
			$this->request->data['Employe']['user_id'] = $this->Auth->User('id');
			if($this->Employe->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Employés";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Employees";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			}
			else
				$this->Session->setFlash($this->errormessage);
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/add');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/add');
		}

	}
	public function edit($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','employes/edit/'.$id);
			$this->set('current_iconviewname',"Modification d'un employé");
			$this->set('title_for_layout',"Modification d'un employé");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Employe->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Employe'));
		$this->Employe->id=$id;
		$options = $this->Specialite->find('list', array('fields'=> array('Specialite.id', 'Specialite.nom')));
		$this->set(compact('options'));
		
		if(!$this->request->data)
			$this->request->data=$post;
		else{
		$employe=$this->Specialite->findById($this->request->data['Employe']['specialite_id']);
		$this->request->data['Employe']['specialite'] = $employe['Specialite']['nom'];
		if($this->Employe->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Employés";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Employees";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			}
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/edit');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/edit');
		}

	}
	public function delete($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		if($this->Employe->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Employés";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Employees";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'admin'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/delete');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/delete');
		}

	}
	
	
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','employes/recherche');
			$this->set('current_iconviewname',"Recherche d'employés");
			$this->set('title_for_layout',"Recherche d'employés");
	$this->layout = 'admin';
		$test=0;
	$options = $this->Specialite->find('list', array('fields'=> array('Specialite.id', 'Specialite.nom')));
	$this->set(compact('options'));
		if($this->request->is('Post'))
		{
			$test=1;
			$employe;
			if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Employe']['nom1'];
				$employe=$this->Employe->find('all',array('conditions'=>array('OR' => array('Employe.nom LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '2'){
				$cle=$this->request->data['Employe']['nom2'];
				$employe=$this->Employe->find('all',array('conditions'=>array('OR' => array('Employe.prenom LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '3')
				$employe=$this->Employe->find('all',array('conditions'=>array('Employe.cin="'.$this->request->data['Employe']['cine'].'"')));
			else if($_POST['rechercher'] == '4'){
				$cle=$this->request->data['Employe']['specialite_id'];
				$employe=$this->Employe->find('all',array('conditions'=>array('OR' => array('Employe.specialite_id =' => $cle))));
				}
			else if($_POST['rechercher'] == '5')
				$employe=$this->Employe->find('all',array('conditions'=>array('Employe.spacielite_id='.$this->request->data['Employe']['specialite_id'])));
			$this->set(compact('employe', 'test'));
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
	public function noter(){
			$this->set('current_icon','icons/user_gray.png');
			$this->set('current_controller','employes/tous');
			$this->set('current_controllername','Ressources humaines: Employés');
			$this->set('current_iconview','icons/page_white_edit.png');
			$this->set('current_view','employes/noter');
			$this->set('current_iconviewname',"Noter les employés");
			$this->set('title_for_layout',"Noter les employés");
	$this->layout = 'admin';
		$options = $this->Employe->find('list', array('fields'=> array('Employe.id', 'Employe.nom')));
		$this->Paginator->settings=$this->paginate;
		$optionss=$this->Paginator->paginate('Employe');
		
		$optionss = $this->Employe->find('all');
		$this->set(compact('options','optionss'));
		if($this->request->is('Post')){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Noter";
				$this->request->data['Evennement']['titrear']="تنقيط";
				$this->request->data['Evennement']['titreen']="Note";
				$this->request->data['Evennement']['logiciel']="Employés";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Employees";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Employe->id=$this->request->data['Employe']['nom'];
			$this->Employe->saveField('noter',$this->request->data['Employe']['noter']);
			$this->Employe->saveField('noterinfo',$this->request->data['Employe']['noterinfo']);
			$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'noter'));
		}
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/noter');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/noter');
		}

	}
	public function imprimer($id=null,$pdf=null){
	if($this->Session->read('Auth.User.imprimer')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Rapport d'employé");
	$this->layout = 'imprimer';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		$post=$this->Employe->findById($id);
		if($post){
			//$post=$this->Employe->findById($id);
			if($post){
				$this->set('user',$post);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Employés";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Employees";
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
	public function imprimerliste($pdf=null){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
	$this->set('title_for_layout',"Liste d'employés");
	$this->layout = 'imprimer';
	$date=date('Y-m-d');
	if($this->Session->read('typeempoye')=='mauvais')
		$users=$this->Employe->find('all',array('conditions'=>array('noter'=>'mauvais')));
	else if($this->Session->read('typeempoye')=='moyenne')
		$users=$this->Employe->find('all',array('conditions'=>array('noter'=>'moyenne')));
	else if($this->Session->read('typeempoye')=='bien')
		$users=$this->Employe->find('all',array('conditions'=>array('noter'=>'bien')));
	else if($this->Session->read('typeempoye')=='excellent')
		$users=$this->Employe->find('all',array('conditions'=>array('noter'=>'excellent')));
	else if($this->Session->read('typeempoye')=='cin')
		$users=$this->Employe->find('all',array('conditions'=>array('cinend <'=>$date)));
	else if($this->Session->read('typeempoye')=='contrats')
		$users=$this->Employe->find('all',array('conditions'=>array('datefintravail <'=>$date)));
	else
		$users=$this->Employe->find('all');
		$this->set(compact('users'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Employés";
				$this->request->data['Evennement']['logicielar']="المستخدمين";
				$this->request->data['Evennement']['logicielen']="Employees";
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
	public function mauvais($id=null){
		$this->Session->write('typeempoye','mauvais');
		$this->redirect(array('action'=>'admin'));
	}
	public function moyenne($id=null){
		$this->Session->write('typeempoye','moyenne');
		$this->redirect(array('action'=>'admin'));
	}
	public function bien($id=null){
		$this->Session->write('typeempoye','bien');
		$this->redirect(array('action'=>'admin'));
	}
	public function excellent($id=null){
		$this->Session->write('typeempoye','excellent');
		$this->redirect(array('action'=>'admin'));
	}
	public function tous($id=null){
		$this->Session->write('typeempoye','tous');
		$this->redirect(array('action'=>'admin'));
	}
	public function cin($id=null){
		$this->Session->write('typeempoye','cin');
		$this->redirect(array('action'=>'admin'));
	}
	public function contrats($id=null){
		$this->Session->write('typeempoye','contrats');
		$this->redirect(array('action'=>'admin'));
	}
}
?>