<?php
App::uses('AppController', 'Controller');
class ConsultationsController extends AppController{
	public $helpers = array('Html','Form');
	//public $components = array('DebugKit.Toolbar');
	public $uses= array('Consultation','Slider','Configuration','Evennement');
	public $paginate=array('limit'=>'15','order'=>array('Consultation.id'=>'asc'));
	public $paginatedesc=array('limit'=>'15','order'=>array('Consultation.id'=>'desc'));
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='2' && $user['Consultations']!=='1')
		return false;
	else if(in_array($this->action,array('edit','delete'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Consultation->isOwnedBy($postId,$user['id']))
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
	public function archive(){
	$this->set('title_for_layout',"Archive de pages");
	$this->Paginator->settings=$this->paginate;
	$postliens=$this->Paginator->paginate('Consultation',array('etat'=>1));
	$this->set(compact('postliens'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/archive');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/archive');
		}

	}
	
	public function index(){
			$this->set('current_icon','icons/feed.png');
			$this->set('current_controller','consultations/tous');
			$this->set('current_controllername',"Nouveautés");
			$this->set('current_iconview','icons/application_double.png');
			$this->set('current_view','consultations');
			$this->set('current_iconviewname','Gestion de pages');
			$this->set('title_for_layout',"Gestion de pages");
	$this->layout = 'admin';
	$this->Paginator->settings=$this->paginate;
	if($this->Session->read('tri')=='desc')
		$this->Paginator->settings=$this->paginatedesc;
	
	
	if($this->Session->read('typepage')=='br'){
			$this->set('current_icon','icons/feed.png');
			$this->set('current_controller','consultations/tous');
			$this->set('current_controllername',"Nouveautés");
			$this->set('current_iconview','icons/application_double.png');
			$this->set('current_view','consultations/br');
			$this->set('current_iconviewname','Gestion de pages en Brouillon');
		$post=$this->Paginator->paginate('Consultation',array('etat'=>0));
		$this->set('title_for_layout',"Gestion de pages en Brouillon");
		}
	else if($this->Session->read('typepage')=='pb'){
			$this->set('current_icon','icons/feed.png');
			$this->set('current_controller','consultations/tous');
			$this->set('current_controllername',"Nouveautés");
			$this->set('current_iconview','icons/application_double.png');
			$this->set('current_view','consultations/pb');
			$this->set('current_iconviewname','Gestion de pages Publiés');
		$post=$this->Paginator->paginate('Consultation',array('etat'=>1));
		$this->set('title_for_layout',"Gestion de pages Publiés");
		}
	else
		$post=$this->Paginator->paginate('Consultation');
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
		$this->Session->write('typepage','tous');
		$this->redirect(array('action'=>'index'));
	}
	public function br($id=null){
		$this->Session->write('typepage','br');
		$this->redirect(array('action'=>'index'));
	}
	public function pb($id=null){
		$this->Session->write('typepage','pb');
		$this->redirect(array('action'=>'index'));
	}
	public function view($id=null,$titre=null){
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Consultation->findById($id);
		if($post){
		$titredetest=$post['Consultation']['titre'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Consultation->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Consultation->findById($id);
			if($post){
				$this->set('post',$post);
				$this->set('title_for_layout',$post['Consultation']['titre']);
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
		$this->redirect(array('action'=>'index'));
	}
			$this->set('current_icon','icons/feed.png');
			$this->set('current_controller','consultations/tous');
			$this->set('current_controllername',"Nouveautés");
			$this->set('current_iconview','icons/ajouter.png');
			$this->set('current_view','consultations/add');
			$this->set('current_iconviewname','Ajouter une page');
			$this->set('title_for_layout',"Ajouter une page");
	$this->layout = 'admin';
		if($this->request->is('Post'))
		{
			$this->Consultation->create();
			$this->request->data['Consultation']['user_id'] = $this->Auth->User('id');
			if($this->Consultation->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter une page";
				$this->request->data['Evennement']['titrear']="إضافة صفحة";
				$this->request->data['Evennement']['titreen']="Add a command";
				$this->request->data['Evennement']['logiciel']="Nouveautés";
				$this->request->data['Evennement']['logicielar']="التحديثات";
				$this->request->data['Evennement']['logicielen']="Business Management";
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
	public function delete($id=null){
	if($this->Session->read('Auth.User.delete')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
	$this->layout = 'admin';
		if($this->request->is('get'))
					throw new MethodNotAllowedException();
		if(!$id)
			$this->redirect(array('action'=>'index'));
		if($id==1 || $id==2){
			/*throw new MethodNotAllowedException('Cette une page de base !'); */
			$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				$this->redirect(array('action'=>'index'));
		}
		else{
			if($this->Consultation->delete($id)){
				$this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
				return $this->redirect(array('action'=>'index'));
			}
		}
	}
	public function edit($id=null){
	if($this->Session->read('Auth.User.edit')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
			$this->set('current_icon','icons/feed.png');
			$this->set('current_controller','consultations/tous');
			$this->set('current_controllername',"Nouveautés");
			$this->set('current_iconview','icons/modifier.png');
			$this->set('current_view','consultations/edit/'.$id);
			$this->set('current_iconviewname','Modification d\'une page');
			$this->set('title_for_layout',"Modification d'une page");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'index'));
		$post=$this->Consultation->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide Consultation'));
		$this->Consultation->id=$id;
		if(!$this->request->data)
			$this->request->data=$post;
		else if($this->Consultation->save($this->request->data))
			$this->Session->setFlash($this->editmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
		
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/edit');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/edit');
		}
		
	}
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
			$this->set('current_icon','icons/feed.png');
			$this->set('current_controller','consultations/tous');
			$this->set('current_controllername',"Nouveautés");
			$this->set('current_iconview','icons/rechercher.png');
			$this->set('current_view','consultations/recherche');
			$this->set('current_iconviewname','Recherche de pages');
			$this->set('title_for_layout',"Recherche de pages");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$employe;
			
			if($_POST['rechercher'] == '1'){
				$cle=$this->request->data['Consultation']['titree'];
				$employe=$this->Consultation->find('all',array('conditions'=>array('OR' => array('Consultation.titre LIKE' => "%$cle%",'Consultation.consultation LIKE' => "%$cle%"))));
				}
			//else if($_POST['rechercher'] == '2')
				//$employe=$this->Consultation->find('all',array('conditions'=>array('Consultation.prix between '.$this->request->data['Consultation']['prix1'].' and '.$this->request->data['Consultation']['prix2'].'')));
			else if($_POST['rechercher'] == '2')
				$employe=$this->Consultation->find('all',array('conditions'=>array('Consultation.etat="'.$this->request->data['Consultation']['etat'].'"')));
			else if($_POST['rechercher'] == '3'){
			$dated=$this->request->data['Consultation']['apartir']['year']."-".$this->request->data['Consultation']['apartir']['month']."-".$this->request->data['Consultation']['apartir']['day'];
			$datef=$this->request->data['Consultation']['jusqua']['year']."-".$this->request->data['Consultation']['jusqua']['month']."-".$this->request->data['Consultation']['jusqua']['day'];
			
			$conditions = array('Consultation.created <=' => $datef, 'Consultation.created >=' => $dated);
			$employe=$this->Consultation->find('all', array('conditions' => $conditions));
			}
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
}

?>