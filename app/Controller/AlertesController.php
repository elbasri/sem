<?php
App::uses('AppController', 'Controller');

class AlertesController extends AppController{
	public $helpers=array('Html','Form');
	public $uses=array('User','Service','Demande','Produit','Realisation','Client','Employe','Projet','Consultation','Materiel','Maintenance','Piece','Prime','Specialite','Vacance','Tache','Inventaire','Contrat','Commande','Facture','Devise','Stockaction','Stockcategorie','Recette','Depense');

	public function beforeFilter(){
		parent::beforeFilter();
		/*if (!isset($$this->Auth)) {
            debug(get_included_files());
            die;
        }*/
		//$this->Auth->allow('admin');
	}
	
	public function isAuthorized($user){
	if($user['limites']!=='0' && $user['limites']!=='1' && $user['Alertes']!=='1')
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
	$this->Session->write('type','accueil');
	$this->set('title_for_layout',"Alertes importants");
	$this->layout='admin';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'employe')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		
		$employemr=$this->Employe->find('count',array('conditions'=>array('Employe.civilite'=>'Mr')));
		$employemme=$this->Employe->find('count',array('conditions'=>array('Employe.civilite'=>'Mme')));
		$employemlle=$this->Employe->find('count',array('conditions'=>array('Employe.civilite'=>'Mlle')));
		$employemv=$this->Employe->find('count',array('conditions'=>array('Employe.noter'=>'mauvais')));
		$employebn=$this->Employe->find('count',array('conditions'=>array('Employe.noter'=>'bien')));
		$employemy=$this->Employe->find('count',array('conditions'=>array('Employe.noter'=>'moyenne')));
		$employeex=$this->Employe->find('count',array('conditions'=>array('Employe.noter'=>'excellent')));
		$employecinex=$this->Employe->find('count',array('conditions'=>array('Employe.cinend <'=>$date)));
		$employecontex=$this->Employe->find('count',array('conditions'=>array('Employe.datefintravail <'=>$date)));
		
		$conditions = array('Projet.datef <' => $date);
		$projetterminer=$this->Projet->find('count', array('conditions' => $conditions));
		$conditions = array('Projet.datef >='=>$date,'Projet.dated <='.$date);
		$projetencours=$this->Projet->find('count', array('conditions' => $conditions));
		$conditions = array('Projet.datef >'=>$date,'Projet.dated >'.$date);
		$projetavenir=$this->Projet->find('count', array('conditions' => $conditions));
		
		$clients=$this->Client->find('count',array('conditions'=>array('Client.type'=>'client')));
		$fournisseurs=$this->Client->find('count',array('conditions'=>array('Client.type'=>'fournisseur')));
		$fabricants=$this->Client->find('count',array('conditions'=>array('Client.type'=>'fabricant')));
		$smaintenance=$this->Client->find('count',array('conditions'=>array('Client.type'=>'societem')));
		$sassurance=$this->Client->find('count',array('conditions'=>array('Client.type'=>'societea')));
		$slocation=$this->Client->find('count',array('conditions'=>array('Client.type'=>'societel')));
		
		$conditions = array('Maintenance.datef <' => $date);
		$maintenanceterminer=$this->Maintenance->find('count', array('conditions' => $conditions));
		$conditions = array('Maintenance.datef >=' => $date);
		$maintenanceencours=$this->Maintenance->find('count', array('conditions' => $conditions));
		
		$conditions = array('Vacance.datef <' => $date);
		$vacanceterminer=$this->Vacance->find('count', array('conditions' => $conditions));
		$conditions = array('Vacance.datef >=' => $date);
		$vacanceencours=$this->Vacance->find('count', array('conditions' => $conditions));
		
		$conditions = array('Tache.datef <' => $date);
		$tacheterminer=$this->Tache->find('count', array('conditions' => $conditions));
		$conditions = array('Tache.datef >=' => $date);
		$tacheencours=$this->Tache->find('count', array('conditions' => $conditions));
		
		$invcontratg=$this->Inventaire->find('count',array('conditions'=>array('contratg_id <>'=>0)));
		$invcontratm=$this->Inventaire->find('count',array('conditions'=>array('contratm_id <>'=>0)));
		$invcontrata=$this->Inventaire->find('count',array('conditions'=>array('contrata_id <>'=>0)));
		$invcontratl=$this->Inventaire->find('count',array('conditions'=>array('contratl_id <>'=>0)));
		
		
		$contratt=$this->Contrat->find('count',array('conditions'=>array('datef <='=>$date)));
		$contrate=$this->Contrat->find('count',array('conditions'=>array('datef >'=>$date)));
		$contratg=$this->Contrat->find('count',array('conditions'=>array('type'=>'Garantie')));
		$contratm=$this->Contrat->find('count',array('conditions'=>array('type'=>'Maintenance')));
		$contrata=$this->Contrat->find('count',array('conditions'=>array('type'=>'Assurance')));
		$contratl=$this->Contrat->find('count',array('conditions'=>array('type'=>'Location')));
		
		$devissans=$this->Devise->find('count',array('conditions'=>array('etat'=>'Sans réponse - en attente')));
		$devisaccepte=$this->Devise->find('count',array('conditions'=>array('etat'=>'Accepté')));
		$devisref=$this->Devise->find('count',array('conditions'=>array('etat'=>'Refusé')));
		
		$facturereg=$this->Facture->find('count',array('conditions'=>array('etat'=>'Réglée')));
		$facturenonreg=$this->Facture->find('count',array('conditions'=>array('etat'=>'Non réglée')));
		
		$commandeae=$this->Commande->find('count',array('conditions'=>array('type'=>'A envoyer')));
		$commandear=$this->Commande->find('count',array('conditions'=>array('type'=>'Arrivage')));
		
		$matrerielex=$this->Materiel->find('count',array('conditions'=>array('datef <'=>$date)));
		$matrerielzero=$this->Materiel->find('count',array('conditions'=>array('qte <= 0')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$this->set(compact('marques','familles','imputations','matrerielex','matrerielzero','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum'));
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/index');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/index');
		}
	}
	
}
?>