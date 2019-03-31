<?php
App::uses('AppController', 'Controller');
//::import('AppController', 'Fonctions');
class ProduitsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Produit','User','Configuration','Evennement');
	//public $components = array('DebugKit.Toolbar');
	public $paginate= array('limit'=>'15','order'=>array('Produit.id'=>'asc'));
	public $paginatep= array('limit'=>'6','order'=>array('Produit.id'=>'asc'));
	public $paginatedesc= array('limit'=>'15','order'=>array('Produit.id'=>'desc'));
	
	public function isAuthorized($user){
		if($user['limites']!=='0' && $user['limites']!=='2' && $user['Produits']!=='1')
			return false;
		else if(in_array($this->action,array('voir','presentation')))
			return true;
		else if(in_array($this->action,array('edit','modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Produit->isOwnedBy($postId,$user['id']))
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
	/*if($config['Configuration']['siteweb']==1){
	//$this->redirect(array('controller'=>'users','action'=>'login'));
	echo "<script>alert('".$config['Configuration']['siteweb']."')</script>";
	}*/
	$this->set('title_for_layout',"Gestion des produits");
	//$this->redirect(array('action'=>'../'));
	$this->layout = 'admin';
	$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
		
	if($this->Session->read('typeproduit')=='br'){
		$post=$this->Paginator->paginate('Produit',array('etat'=>0));
				$this->set('current_icon','icons/package.png');
				$this->set('current_controller','produits/tous');
				$this->set('current_controllername','Produits');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','produits/br');
				$this->set('current_iconviewname',"Gestion de produits en Brouillon");
				$this->set('title_for_layout',"Gestion de produits en Brouillon");
		}
	else if($this->Session->read('typeproduit')=='pb'){
		$post=$this->Paginator->paginate('Produit',array('etat'=>1));
				$this->set('current_icon','icons/package.png');
				$this->set('current_controller','produits/tous');
				$this->set('current_controllername','Produits');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','produits/pb');
				$this->set('current_iconviewname',"Gestion de produits Publiés");
				$this->set('title_for_layout',"Gestion de produits Publiés");
		}
	else{
				$this->set('current_icon','icons/package.png');
				$this->set('current_controller','produits/tous');
				$this->set('current_controllername','Produits');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','produits/tous');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Produit');
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
		$this->Session->write('typeproduit','tous');
		$this->redirect(array('action'=>'index'));
	}
	public function br($id=null){
		$this->Session->write('typeproduit','br');
		$this->redirect(array('action'=>'index'));
	}
	public function pb($id=null){
		$this->Session->write('typeproduit','pb');
		$this->redirect(array('action'=>'index'));
	}
	
	public function voir($id=null,$titre=null){
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Produit->findById($id);
		if($post){
		$titredetest=$post['Produit']['titre'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Produit->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Produit->findById($id);
			if($post){
				if($post['Produit']['etat']=="1"){
				$this->set('title_for_layout',$post['Produit']['titre']);
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
				$this->set('current_icon','icons/package.png');
				$this->set('current_controller','produits/tous');
				$this->set('current_controllername','Produits');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','produits/add');
				$this->set('current_iconviewname',"Ajouter un produit");
				$this->set('title_for_layout',"Ajouter un produit");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Produit->create();
			$this->request->data['Produit']['user_id'] = $this->Auth->User('id');
			if($this->Produit->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Produits";
				$this->request->data['Evennement']['logicielar']="منتجات";
				$this->request->data['Evennement']['logicielen']="Products";
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
		if($this->Produit->delete($id)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Supprimer";
				$this->request->data['Evennement']['titrear']="إزالة";
				$this->request->data['Evennement']['titreen']="Delete";
				$this->request->data['Evennement']['logiciel']="Produits";
				$this->request->data['Evennement']['logicielar']="منتجات";
				$this->request->data['Evennement']['logicielen']="Products";
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
				$this->set('current_icon','icons/package.png');
				$this->set('current_controller','produits/tous');
				$this->set('current_controllername','Produits');
				$this->set('current_iconview','icons/modifier.png');
				$this->set('current_view','produits/modifier/'.$id);
				$this->set('current_iconviewname',"Modification d'un produit");
				$this->set('title_for_layout',"Modification d'un produit");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'index'));
		$post=$this->Produit->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Produit'));
		$this->Produit->id=$id;
		if($this->Produit->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Modifier";
				$this->request->data['Evennement']['titrear']="تعديل";
				$this->request->data['Evennement']['titreen']="Edit";
				$this->request->data['Evennement']['logiciel']="Produits";
				$this->request->data['Evennement']['logicielar']="منتجات";
				$this->request->data['Evennement']['logicielen']="Products";
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
		$postf=$this->Paginator->paginate('Produit',array('Produit.etat'=>'1'));
		$this->set(compact('postf'));
		//$this->set('postf',$this->Produit->find('all'));
		$this->set('title_for_layout','Nos Produits');
	
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
				$this->set('current_icon','icons/package.png');
				$this->set('current_controller','produits/tous');
				$this->set('current_controllername','Produits');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','produits/recherche');
				$this->set('current_iconviewname',"Recherche de produits");
				$this->set('title_for_layout',"Recherche de produits");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$employe;
			
			if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Produit']['titree'];
				$employe=$this->Produit->find('all',array('conditions'=>array('OR' => array('Produit.titre LIKE' => "%$cle%",'Produit.produit LIKE' => "%$cle%"))));
				}
			else if($_POST['rechercher'] == '2')
				$employe=$this->Produit->find('all',array('conditions'=>array('Produit.prix between '.$this->request->data['Produit']['prix1'].' and '.$this->request->data['Produit']['prix2'].'')));
			else if($_POST['rechercher'] == '3')
				$employe=$this->Produit->find('all',array('conditions'=>array('Produit.etat="'.$this->request->data['Produit']['etat'].'"')));
			
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