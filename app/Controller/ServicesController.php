<?php
App::uses('AppController', 'Controller');
//::import('AppController', 'Fonctions');
class ServicesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Service','User','Configuration','Evennement');
	//public $components = array('DebugKit.Toolbar');
	public $paginate= array('limit'=>'15','order'=>array('Service.id'=>'asc'));
	public $paginatep= array('limit'=>'6','order'=>array('Service.id'=>'asc'));
	public $paginatedesc= array('limit'=>'15','order'=>array('Service.id'=>'desc'));
	
	public function isAuthorized($user){
		if($user['limites']!=='0' && $user['limites']!=='2' && $user['Services']!=='1')
			return false;
		else if(in_array($this->action,array('voir','presentation')))
			return true;
		else if(in_array($this->action,array('edit','modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Service->isOwnedBy($postId,$user['id']))
				return true;
			else if($user['role']!=='admin')
				$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		}
		return parent::isAuthorized($user);
	}
public function beforeFilter(){
$configs=$this->Configuration->find('first',array('fields'=>array('Configuration.siteweb')));
if($configs['Configuration']['siteweb']==0){
			$this->redirect(array('controller'=>'users','action'=>'login'));
		}
parent::beforeFilter();

}
	public function index(){
	//$this->redirect(array('action'=>'../'));
	$this->layout = 'admin';
	$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	
	if($this->Session->read('typeservice')=='br'){
		$post=$this->Paginator->paginate('Service',array('etat'=>0));
				$this->set('current_icon','icons/shape_move_back.png');
				$this->set('current_controller','services/tous');
				$this->set('current_controllername','Services');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','services/br');
				$this->set('current_iconviewname',"Gestion de services en Brouillon");
				$this->set('title_for_layout',"Gestion de services en Brouillon");
		}
	else if($this->Session->read('typeservice')=='pb'){
		$post=$this->Paginator->paginate('Service',array('etat'=>1));
				$this->set('current_icon','icons/shape_move_back.png');
				$this->set('current_controller','services/tous');
				$this->set('current_controllername','Services');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','services/pb');
				$this->set('current_iconviewname',"Gestion de services Publiés");
				$this->set('title_for_layout',"Gestion de services Publiés");
		}
	else{
				$this->set('current_icon','icons/shape_move_back.png');
				$this->set('current_controller','services/tous');
				$this->set('current_controllername','Services');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','services/tous');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Service');
		}
	$this->set(compact('post'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/index');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/index');
		}
	
	}
	public function triasc($id=null){
		$this->Session->write('tri','asc');
		$this->redirect(array('action'=>'index'));
	}
	public function tridesc($id=null){
		$this->Session->write('tri','desc');
		$this->redirect(array('action'=>'index'));
	}
	public function tous($id=null){
		$this->Session->write('typeservice','tous');
		$this->redirect(array('action'=>'index'));
	}
	public function br($id=null){
		$this->Session->write('typeservice','br');
		$this->redirect(array('action'=>'index'));
	}
	public function pb($id=null){
		$this->Session->write('typeservice','pb');
		$this->redirect(array('action'=>'index'));
	}
	
	public function voir($id=null,$titre=null){
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Service->findById($id);
		if($post){
		$titredetest=$post['Service']['titre'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Service->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Service->findById($id);
			if($post){
				if($post['Service']['etat']=="1"){
				$this->set('title_for_layout',$post['Service']['titre']);
				$this->set('post',$post);
				}
				else{
					$this->Session->setFlash($this->notfoundmessage);
					$this->redirect(array('action'=>'presentation'));
				}
				}
				else
				throw new NotFoundException($this->notfoundmessage);
			}
		else{
			throw new NotFoundException($this->notfoundmessage);
			}
		}
		else{
			throw new NotFoundException($this->notfoundmessage);
			}
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/voir');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/voir');
		}
	
	}
	public function add(){
	if($this->Session->read('Auth.User.add')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
				$this->set('current_icon','icons/shape_move_back.png');
				$this->set('current_controller','services/tous');
				$this->set('current_controllername','Services');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','services/add');
				$this->set('current_iconviewname',"Ajouter une service");
				$this->set('title_for_layout',"Ajouter une service");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Service->create();
			$this->request->data['Service']['user_id'] = $this->Auth->User('id');
			if($this->Service->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Services";
				$this->request->data['Evennement']['logicielar']="الخدمات";
				$this->request->data['Evennement']['logicielen']="Services";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
				$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'index'));
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
		$this->redirect(array('action'=>'index'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'index'));
		if($this->Service->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Services";
				$this->request->data['Evennement']['logicielar']="الخدمات";
				$this->request->data['Evennement']['logicielen']="Services";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			return $this->redirect(array('action'=>'index'));
		}
	}
	public function modifier($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
				$this->set('current_icon','icons/shape_move_back.png');
				$this->set('current_controller','services/tous');
				$this->set('current_controllername','Services');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','services/modifier');
				$this->set('current_iconviewname',"Modification d'une service");
				$this->set('title_for_layout',"Modification d'une service");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'index'));
		$post=$this->Service->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Service'));
		$this->Service->id=$id;
		if($this->Service->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Services";
				$this->request->data['Evennement']['logicielar']="الخدمات";
				$this->request->data['Evennement']['logicielen']="Services";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
				
			$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
			}
		if(!$this->request->data)
			$this->request->data=$post;
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/modifier');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/modifier');
		}
	
	}
	
	public function presentation(){
		//$this->layout = 'admin';
		$this->Paginator->settings=$this->paginatep;
		$postf=$this->Paginator->paginate('Service',array('Service.etat'=>'1'));
		$this->set(compact('postf'));
		//$this->set('postf',$this->Service->find('all'));
		$this->set('title_for_layout','Nos Services');
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/presentation');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/presentation');
		}
	
	}
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
				$this->set('current_icon','icons/shape_move_back.png');
				$this->set('current_controller','services/tous');
				$this->set('current_controllername','Services');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','services/recherche');
				$this->set('current_iconviewname',"Recherche de services");
				$this->set('title_for_layout',"Recherche de services");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$employe;
			
			if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Service']['titree'];
				$employe=$this->Service->find('all',array('conditions'=>array('OR' => array('Service.titre LIKE' => "%$cle%",'Service.service LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '2')
				$employe=$this->Service->find('all',array('conditions'=>array('Service.prix between '.$this->request->data['Service']['prix1'].' and '.$this->request->data['Service']['prix2'].'')));
			else if($_POST['rechercher'] == '3')
				$employe=$this->Service->find('all',array('conditions'=>array('Service.etat="'.$this->request->data['Service']['etat'].'"')));
			
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
	
} // fin de "appcontroller"
?>