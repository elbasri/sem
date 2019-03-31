<?php
App::uses('AppController', 'Controller');

class StockactionsController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses = array('Stockaction','Materiel','Inventaire','Client','Evennement','Stockcategorie');
	public $paginate= array('limit'=>'10','order'=>array('Stockaction.id'=>'asc'));
	public $paginatedesc= array('limit'=>'10','order'=>array('Stockaction.id'=>'desc'));
	public $paginategoup= array('limit'=>'10','group' => array('Stockaction.materiel_nom'),'order'=>array('qtt'=> 'desc'));
	public $paginategoups= array('limit'=>'10','group' => array('Stockaction.client_nom'),'order'=>array('qtt'=> 'desc'));
	public $paginateservice= array('limit'=>'10','order'=>array('client_nom'=> 'asc'));
	//array('group' => array('Stockaction.materiel_nom'),'order'=>array('qtt desc'),'conditions'=>array('nom'=>'entrée'))
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Stockactions']!=='1')
		return false;
	else if(in_array($this->action,array('modifier','supprimer'))){
			$postId= (int) $this->request->params['pass'][0];
			if(isset($user['id']) && $user['id']==='1' || $this->Stockaction->isOwnedBy($postId,$user['id']))
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
	
	if($this->Session->read('typeoperation')=='entree'){
				$this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/flag_green.png');
				$this->set('current_view','stockactions/entree');
				$this->set('current_iconviewname',"Les opérations d'entrées");
				$this->set('title_for_layout',"Les opérations d'entrées");
		$post=$this->Paginator->paginate('Stockaction',array('nom'=>'entrée'));
		}
	else if($this->Session->read('typeoperation')=='sortie'){
				$this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/flag_red.png');
				$this->set('current_view','stockactions/sortie');
				$this->set('current_iconviewname',"Les opérations de sorties");
				$this->set('title_for_layout',"Les opérations de sorties");
		$post=$this->Paginator->paginate('Stockaction',array('nom'=>'sortie'));
		}
        else if($this->Session->read('typeoperation')=='groupmaterielentree'){
                $this->Paginator->settings=$this->paginategoup;
                                $this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/flag_red.png');
				$this->set('current_view','stockactions/groupmaterielentree');
				$this->set('current_iconviewname',"Groupement des entrées par articles");
				$this->set('title_for_layout',"Groupement des entrées par articles");
		$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$post=$this->Paginator->paginate('Stockaction',array('nom'=>'entrée'));
        }
        else if($this->Session->read('typeoperation')=='groupmaterielsortie'){
                $this->Paginator->settings=$this->paginategoup;
                                $this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/flag_red.png');
				$this->set('current_view','stockactions/groupmaterielsortie');
				$this->set('current_iconviewname',"Groupement des sorties par articles");
				$this->set('title_for_layout',"Groupement des sorties par articles");
		$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$post=$this->Paginator->paginate('Stockaction',array('nom'=>'sortie'));
        }
        else if($this->Session->read('typeoperation')=='groupservices'){
                $this->Paginator->settings=$this->paginategoups;
                                $this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/flag_red.png');
				$this->set('current_view','stockactions/groupmaterielsortie');
				$this->set('current_iconviewname',"Groupement des sorties par emplacements");
				$this->set('title_for_layout',"Groupement des sorties par emplacements");
		$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$post=$this->Paginator->paginate('Stockaction',array('nom'=>'sortie'));
        }
        else if($this->Session->read('typeoperation')=='triparservice'){
                                $this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/flag_red.png');
				$this->set('current_view','stockactions/groupmaterielsortie');
				$this->set('current_iconviewname',"Groupement des sorties par emplacements");
				$this->set('title_for_layout',"Groupement des sorties par emplacements");
		//$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$this->Paginator->settings=$this->paginateservice;
		$post=$this->Paginator->paginate('Stockaction',array('nom'=>'sortie'));
        }
	else{
				$this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/admin.png');
				$this->set('current_view','stockactions/journale');
				$this->set('current_iconviewname',"Administration");
				$this->set('title_for_layout',"Administration");
		$post=$this->Paginator->paginate('Stockaction');
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
	$this->layout = 'admin';
		if(!$id){
			$this->redirect(array('action'=>'../'));
		}
		if(!$titre){
		$this->redirect(array('action'=>'../'));
		}
		$post=$this->Stockaction->findById($id);
		if($post){
		$titredetest=$post['Stockaction']['nom'];
		$titredetest=Inflector::slug($titredetest,$replacement ='_');
		
		//$post=$this->Stockaction->findByTitre($titre);
		if($titre==$titredetest){
			//$post=$this->Stockaction->findById($id);
			if($post){
				$this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/afficher.png');
				$this->set('current_view','stockactions/view/'.$id."/".$titre);
				$this->set('current_iconviewname',"Opération: ".$post['Stockaction']['nom']);
				$this->set('title_for_layout',"Opération: ".$post['Stockaction']['nom']);
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
				$this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/ajouter.png');
				$this->set('current_view','stockactions/add');
				$this->set('current_iconviewname',"Ajouter une opération");
				$this->set('title_for_layout',"Ajouter une opération");
	$this->layout = 'admin';
	$options = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom', 'Materiel.ref'),'order'=>array('Materiel.nom'=>'asc')));
	//$options = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom', 'Materiel.ref'),'conditions' =>  array ('OR' => array(array('typemateriel' => "Fourniture de bureau"),array('typemateriel' => "Fourniture informatique"),array('typemateriel' => "Produits d'hygiène"))),'order'=>array('Materiel.nom'=>'asc')));
	$optionc = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'order'=>array('Client.nom'=>'asc'),'conditions'=>array('type'=>'client'),'order'=>array('Client.nom'=>'asc')));
	$optionf = $this->Client->find('list', array('fields'=> array('Client.id', 'Client.nom'),'order'=>array('Client.nom'=>'asc'),'conditions'=>array('type'=>'fournisseur'),'order'=>array('Client.nom'=>'asc')));
	//$optiona = $this->Inventaire->find('list', array('fields'=> array('Inventaire.id', 'Inventaire.nom')));
	$this->set(compact('options','optionc','optionf'));
		if($this->request->is('Post'))
		{
			$this->Stockaction->create();
			
			if($this->request->data['Stockaction']['nom']=="entrée"){
			
                            //$employe=$this->Client->findById($this->request->data['Stockaction']['client_id']);
                            $this->request->data['Stockaction']['client_nom'] = "Dépot Al Fida Mers Sultan";
                            $employe=$this->Client->findById($this->request->data['Stockaction']['fournisseur_id']);
                            $this->request->data['Stockaction']['fournisseur_nom'] = $employe['Client']['nom'];
                            
			}
			else if($this->request->data['Stockaction']['nom']=="sortie"){
			
                            $employe=$this->Client->findById($this->request->data['Stockaction']['client_id']);
                            $this->request->data['Stockaction']['client_nom'] = $employe['Client']['nom'];
                            //$employe=$this->Client->findById($this->request->data['Stockaction']['fournisseur_id']);
                            $this->request->data['Stockaction']['fournisseur_nom'] = "Dépot Al Fida Mers Sultan";
                            
			}
			
			$invref="";
			$invfrsid="";
			$invfrsnom="";
			$employe=$this->Materiel->findById($this->request->data['Stockaction']['materiel_id']);
		   	if($employe['Materiel']['ref']!=null){
				$this->request->data['Stockaction']['materiel_nom'] = $employe['Materiel']['nom'];
				//." - ".$employe['Materiel']['ref'];
				$this->request->data['Stockaction']['ref'] = $employe['Materiel']['ref'];
				$invref = $employe['Materiel']['ref'];
				$invfrsid = $employe['Materiel']['fournisseur_id'];
				$invfrsnom = $employe['Materiel']['fournisseur_nom'];
				}
                        else
				$this->request->data['Stockaction']['materiel_nom'] = $employe['Materiel']['nom'];
				
			$this->request->data['Stockaction']['cout'] = $employe['Materiel']['prix']*$this->request->data['Stockaction']['qte'];
			if(isset($this->request->data['Stockaction']['type'])){
				if($this->request->data['Stockaction']['type']!='1' && $this->request->data['Stockaction']['type']!='2'){
					$this->request->data['Stockaction']['type']='0';
				}
			}
			else
				$this->request->data['Stockaction']['type']='0';
			$this->request->data['Stockaction']['user_id'] = $this->Auth->User('id');
			
			$qte=$employe['Materiel']['qte'];
			$type;
			if($this->request->data['Stockaction']['nom']=="entrée"){
				$qte=$qte+$this->request->data['Stockaction']['qte'];
				$type="entrée";
			}
			else if($this->request->data['Stockaction']['nom']=="sortie"){
				$qte=$qte-$this->request->data['Stockaction']['qte'];
				$type="sortie";
			}
			$this->request->data['Stockaction']['cout']=$qte*$employe['Materiel']['prix'];
			/*if($qte<$employe['Materiel']['min'] && $qte>=0 && $type=="sortie")
				$this->Session->setFlash('Erreur: La quantité demandé est disponible, mais Vous ne pouvez pas faire une operation de sortie dans le cas de la quantité requise dépasse le minimum admissible dans l\'article<br> merci de verifier le Minimum stock pour cet article'));
			else if($qte<0 && $type=="sortie")*/
			if($qte<0 && $type=="sortie")
				$this->Session->setFlash($this->qtemessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
			/*else if($qte>$employe['Materiel']['max'] && $type=="entrée")
				$this->Session->setFlash($this->qtemaxmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
				*/
			else if($this->Stockaction->save($this->request->data)){
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Ajouter";
				$this->request->data['Evennement']['titrear']="إضافة";
				$this->request->data['Evennement']['titreen']="Add";
				$this->request->data['Evennement']['logiciel']="Journale";
				$this->request->data['Evennement']['logicielar']="جدول العمليات";
				$this->request->data['Evennement']['logicielen']="Journal";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
					/*$this->Materiel->id=$this->request->data['Stockaction']['materiel_id'];
					$this->Materiel->saveField('qte',$qte);
					$prix=$employe['Materiel']['prix']*$qte;
					$this->Materiel->saveField('cout',$prix);*/
					
					if($this->request->data['Stockaction']['nom']=="sortie"){
						$inv=$this->Inventaire->find('first', array('conditions'=>array('piece_id'=>$this->request->data['Stockaction']['client_id'])));
						if($inv and $invref!=""){
							/*$this->Inventaire->id=$inv['Inventaire']['id'];
							$this->Inventaire->saveField('qte',$qte);*/
							$stcat=$this->Stockcategorie->find('first', array('conditions'=>array('nom'=>$this->request->data['Stockaction']['materiel_nom'])));
							if(!$stcat){
								$datastcat = array(
									'Stockcategorie' => array(
										'nom' => $this->request->data['Stockaction']['materiel_nom']
									)
								);
								$this->Stockcategorie->create();
								$this->Stockcategorie->save($datastcat);
								$stcat=$this->Stockcategorie->findById($this->Stockcategorie->id);
							$designationnom=$stcat['Stockcategorie']['nom'];
							$designationid=$stcat['Stockcategorie']['id'];
							$data = array(
								'Inventaire' => array(
									'nom_id' => $designationid,
									'nom' => $designationnom,
									'piece_id' => $inv['Inventaire']['piece_id'],
									'piece_nom' => $inv['Inventaire']['piece_nom'],
									'qte' => $this->request->data['Stockaction']['qte'],
									'etat' => 'Bon',
									'ref' => $invref,
									'fournisseur_id' => $invfrsid,
									'fournisseur_nom' => $invfrsnom,
									'date' => $this->request->data['Stockaction']['date']
								)
							);
							$this->Inventaire->create();
							$this->Inventaire->save($data);
							}else{
								$invs=$this->Inventaire->find('first', array('conditions'=>array('piece_id'=>$this->request->data['Stockaction']['client_id'],'nom'=>$stcat['Stockcategorie']['nom'])));
								if($invs){
								/*$this->Inventaire->id=$invs['Inventaire']['id'];
								$qteinv=$this->request->data['Stockaction']['qte'] + $invs['Inventaire']['qte'];
								$this->Inventaire->saveField('qte',$qteinv);*/
								}
								else{
									$designationnom=$stcat['Stockcategorie']['nom'];
							$designationid=$stcat['Stockcategorie']['id'];
							$data = array(
								'Inventaire' => array(
									'nom_id' => $designationid,
									'nom' => $designationnom,
									'piece_id' => $inv['Inventaire']['piece_id'],
									'piece_nom' => $inv['Inventaire']['piece_nom'],
									'qte' => $this->request->data['Stockaction']['qte'],
									'etat' => 'Bon',
									'ref' => $invref,
									'fournisseur_id' => $invfrsid,
									'fournisseur_nom' => $invfrsnom,
									'date' => $this->request->data['Stockaction']['date']
								)
							);
							$this->Inventaire->create();
							$this->Inventaire->save($data);
								}
							}
							
						}
					}
					
					$this->Session->setFlash($this->addmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
					return $this->redirect(array('action'=>'admin'));
				}
			else
				$this->Session->setFlash($this->notfoundmessage);
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
		$post=$this->Stockaction->findById($id);
		if($post){
                    if($this->Stockaction->delete($id)){
                    
                            $materiel=$this->Materiel->findById($post['Stockaction']['materiel_id']);
                            if($materiel){
                                $qte=$materiel['Materiel']['qte'];
                                    if($post['Stockaction']['nom']=="entrée" and $qte>=1){
                                            $qte=$qte-$post['Stockaction']['qte'];
                                    }
                                    else if($post['Stockaction']['nom']=="sortie"){
                                            $qte=$qte+$post['Stockaction']['qte'];
                                    }
                                    /*$this->Materiel->id=$post['Stockaction']['materiel_id'];
                                    $this->Materiel->saveField('qte',$qte);*/
                            }
                                    $this->Evennement->create();
                                    $this->request->data['Evennement']['titre']="Supprimer";
                                    $this->request->data['Evennement']['titrear']="إزالة";
                                    $this->request->data['Evennement']['titreen']="Delete";
                                    $this->request->data['Evennement']['logiciel']="Journale";
                                    $this->request->data['Evennement']['logicielar']="جدول العمليات";
                                    $this->request->data['Evennement']['logicielen']="Journal";
                                    $this->request->data['Evennement']['user']=$this->Auth->User('username');
                                    $this->request->data['Evennement']['iduser']=$this->Auth->User('id');
                                    $this->Evennement->save($this->request->data);
                            
                            $this->Session->setFlash($this->delmessage, 'default', array('id' => 'flashMessage', 'class' => 'success'));
                            return $this->redirect(array('action'=>'admin'));
                    }
		}
	}
	public function modifier($id=null){/*
	$this->set('title_for_layout',"Modification d'une opération");
	$this->layout = 'admin';
		if(!$id)
			$this->redirect(array('action'=>'admin'));
		$post=$this->Stockaction->findById($id);
		if(!$post)
			throw new NotFoundException(_('Invalide opération'));
		$this->Stockaction->id=$id;
		
		if(!$this->request->data){
			$this->request->data=$post;
			$options = $this->Materiel->find('list', array('fields'=> array('Materiel.id', 'Materiel.nom')));
			$this->set(compact('options'));
			}
		else if($this->Stockaction->save($this->request->data)){
			$this->Session->setFlash('l\'opération a été bien Modifier'));
			return $this->redirect(array('action'=>'admin'));
			}*/
	}
	public function recherche(){
	if($this->Session->read('Auth.User.recherche')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'admin'));
	}
				$this->set('current_icon','icons/flag_blue.png');
				$this->set('current_controller','stockactions/journale');
				$this->set('current_controllername','Journale Sortie/Entrée');
				$this->set('current_iconview','icons/rechercher.png');
				$this->set('current_view','stockactions/recherche');
				$this->set('current_iconviewname',"Recherche d'opérations");
				$this->set('title_for_layout',"Recherche d'opérations");
	$this->layout = 'admin';
		$test=0;
		if($this->request->is('Post'))
		{
			$test=1;
			$realisation;
			$ides=$this->request->data['Stockaction']['ides'];
			$ide=$this->request->data['Stockaction']['ide'];
			if($_POST['rechercher'] == '1')
                                $realisation=$this->Stockaction->find('all',array('conditions'=>array('OR' => array('Stockaction.materiel_nom LIKE' => "%$ide%"))));
			else if($_POST['rechercher'] == '2'){
			$dated=$this->request->data['Stockaction']['dated']['year']."-".$this->request->data['Stockaction']['dated']['month']."-".$this->request->data['Stockaction']['dated']['day'];
			$datef=$this->request->data['Stockaction']['datef']['year']."-".$this->request->data['Stockaction']['datef']['month']."-".$this->request->data['Stockaction']['datef']['day'];
			
				if($this->Session->read('typeoperation')=='entree')
					$conditions = array('Stockaction.date <=' => $datef, 'Stockaction.date >=' => $dated,'nom'=>'entrée');
				else if($this->Session->read('typeoperation')=='sortie')
					$conditions = array('Stockaction.date <=' => $datef, 'Stockaction.date >=' => $dated,'nom'=>'sortie');
				else
					$conditions = array('Stockaction.date <=' => $datef, 'Stockaction.date >=' => $dated);
					
			$realisation=$this->Stockaction->find('all', array('conditions' => $conditions));
				//$realisation=$this->Stockaction->find('all',array('conditions'=>array('Stockaction.jusqua BETWEEN '.$dated.' AND '.$datef)));
				//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
			}
			else if($_POST['rechercher'] == '3')
                                $realisation=$this->Stockaction->find('all',array('conditions'=>array('OR' => array('Stockaction.client_nom LIKE' => "%$ides%"))));
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
		$post=$this->Stockaction->findById($id);
		if($post){
			//$post=$this->Stockaction->findById($id);
			if($post){
				$this->set('title_for_layout',"BON DE LIVRAISON");
				$this->set('post',$post);
				$distination=$post['Stockaction']['client_nom'];
				$this->set('distination',$distination);
				$this->set('topdate',1);
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer";
				$this->request->data['Evennement']['titrear']="طباعة";
				$this->request->data['Evennement']['titreen']="Print";
				$this->request->data['Evennement']['logiciel']="Journale";
				$this->request->data['Evennement']['logicielar']="جدول العمليات";
				$this->request->data['Evennement']['logicielen']="Journal";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			$footersign=1;
				$this->set('footersign',$footersign);
				if($pdf=="pdf"){
						$name=$this->request->params['controller']."_liste_".md5(time());
						$this->layout = 'imprimerpdf';
						
						$this->Mpdf->init();
						$this->Mpdf->setAutoTopMargin = 'stretch';
						$this->Mpdf->setAutoBottomMargin = 'stretch';
						$view = new View($this, false);
                                                $header = $view->element('imprimerheaderpdf');
                                                $footer = $view->element('imprimerfooter');
						$this->Mpdf->SetHTMLHeader($header);
						//$this->Mpdf->SetHTMLFooter($footer."<font size='1'>Page {PAGENO} de {nb}</font>");
						$this->Mpdf->SetHTMLFooter($footer);
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
	$this->set('title_for_layout',"Journale des entrées/sorties");
	$this->layout = 'imprimer';
	
	if($this->Session->read('typeoperation')=='entree'){
		$post=$this->Stockaction->find('all',array('conditions'=>array('nom'=>'entrée'),'order'=>array('date desc')));
		$this->set('title_for_layout',"Journale des entrées");
		}
	else if($this->Session->read('typeoperation')=='sortie'){
		$post=$this->Stockaction->find('all',array('conditions'=>array('nom'=>'sortie'),'order'=>array('date desc')));
		$this->set('title_for_layout',"Journale des sorties");
		}
        else if($this->Session->read('typeoperation')=='groupmaterielsortie'){
		$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$post=$this->Stockaction->find('all',array('group' => array('Stockaction.materiel_nom'),'order'=>array('qtt desc'),'conditions'=>array('nom'=>'sortie','date >='=>date('2017-01-01'))));
        }
        else if($this->Session->read('typeoperation')=='groupmaterielentree'){
		$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$post=$this->Stockaction->find('all',array('group' => array('Stockaction.materiel_nom'),'order'=>array('qtt desc'),'conditions'=>array('nom'=>'entrée','date >='=>date('2017-01-01'))));
        }
        else if($this->Session->read('typeoperation')=='groupservices'){
		$this->Stockaction->virtualFields= array('qtt'=>'SUM(Stockaction.qte)');
		$post=$this->Stockaction->find('all',array('group' => array('Stockaction.client_nom'),'order'=>array('qtt desc'),'conditions'=>array('nom'=>'sortie','date >='=>date('2017-01-01'))));
        }
        else if($this->Session->read('typeoperation')=='triparservice'){
		$post=$this->Stockaction->find('all',array('conditions'=>array('nom'=>'sortie','date >='=>date('2017-01-01')),'order'=>array('client_nom asc')));
		$this->set('title_for_layout',"Journale des sorties par emplacement");
        }
        else if($this->Session->read('typeoperation')=='articleparservice'){
		$post=$this->Stockaction->find('all',array('conditions'=>array('nom'=>'sortie','date >='=>date('2017-01-01')),'order'=>array('materiel_nom asc')));
		$this->set('title_for_layout',"Quantité des sorties par emplacement");
        }
	else
		$post=$this->Stockaction->find('all',array('order'=>array('date desc')));
		
		$this->set(compact('post'));
			
				$this->Evennement->create();
				$this->request->data['Evennement']['titre']="Imprimer liste";
				$this->request->data['Evennement']['titrear']="طباعة قائمة";
				$this->request->data['Evennement']['titreen']="Print list";
				$this->request->data['Evennement']['logiciel']="Journale";
				$this->request->data['Evennement']['logicielar']="جدول العمليات";
				$this->request->data['Evennement']['logicielen']="Journal";
				$this->request->data['Evennement']['user']=$this->Auth->User('username');
				$this->request->data['Evennement']['iduser']=$this->Auth->User('id');
				$this->Evennement->save($this->request->data);
			
		 if($pdf=="pdf"){
						$name=$this->request->params['controller']."_liste_".md5(time());
						$this->layout = 'imprimerpdf';
						
						$this->Mpdf->init();
						$this->Mpdf->setAutoTopMargin = 'stretch';
						$this->Mpdf->setAutoBottomMargin = 'stretch';
						$view = new View($this, false);
                                                $header = $view->element('imprimerheaderpdf');
                                                $footer = $view->element('imprimerfooter');
						$this->Mpdf->SetHTMLHeader($header);
						$this->Mpdf->SetHTMLFooter($footer."<font size='1'>Page {PAGENO} de {nb}</font>");
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
	public function entree($id=null){
		$this->Session->write('typeoperation','entree');
		$this->redirect(array('action'=>'admin'));
	}
	public function sortie($id=null){
		$this->Session->write('typeoperation','sortie');
		$this->redirect(array('action'=>'admin'));
	}
	public function groupmaterielsortie($id=null){
		$this->Session->write('typeoperation','groupmaterielsortie');
		$this->redirect(array('action'=>'admin'));
	}
	public function groupmaterielentree($id=null){
		$this->Session->write('typeoperation','groupmaterielentree');
		$this->redirect(array('action'=>'admin'));
	}
	public function groupservices($id=null){
		//$this->Session->write('typeoperation','groupservices');
		$this->Session->write('typeoperation','triparservice');
		$this->redirect(array('action'=>'admin'));
	}
	public function articleparservice($id=null){
		$this->Session->write('typeoperation','articleparservice');
		$this->redirect(array('action'=>'admin'));
	}
	public function journale($id=null){
		$this->Session->write('typeoperation','journale');
		$this->redirect(array('action'=>'admin'));
	}
	
	public function entreeliste($id=null){
		$this->Session->write('typeoperation','entree');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
	public function sortieliste($id=null){
		$this->Session->write('typeoperation','sortie');
		if($id)
			$this->redirect(array('action'=>'imprimerliste/pdf'));
		else
			$this->redirect(array('action'=>'imprimerliste'));
	}
} // fin de "appcontroller"
?>