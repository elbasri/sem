<?php
App::uses('AppController', 'Controller');

class StatistiquesController extends AppController{
	public $helpers = array('Html', 'Form');
	public $uses=array('User','Service','Demande','Produit','Realisation','Client','Employe','Projet','Consultation','Materiel','Maintenance','Piece','Prime','Specialite','Vacance','Tache','Inventaire','Contrat','Commande','Facture','Devise','Stockaction','Stockcategorie','Recette','Depense');
	//public $components = array('DebugKit.Toolbar');
	
	
	public function isAuthorized($user){
		if($user['limites']!=='0' && $user['limites']!=='1' && $user['Statistiques']!=='1')
			return false;
		return parent::isAuthorized($user);
	}
	public function imprimergraphique(){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
	$this->set('title_for_layout',"Statistiques | Graphe");
	$this->layout = 'imprimer';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$Demandecount=$this->Demande->find('count');
		$Servicecount=$this->Service->find('count');
		$Produitcount=$this->Produit->find('count');
		$Realisationcount=$this->Realisation->find('count');
		$Clientcount=$this->Client->find('count');
		$Employecount=$this->Employe->find('count');
		$Projetcount=$this->Projet->find('count');
		$Inventairecount=$this->Inventaire->find('count');
		$Pagecount=$this->Consultation->find('count');
		$Materielcount=$this->Materiel->find('count');
		$Maintenancecount=$this->Maintenance->find('count');
		$Piececount=$this->Piece->find('count');
		$Primecount=$this->Prime->find('count');
		$Specialitecount=$this->Specialite->find('count');
		$Vacancecount=$this->Vacance->find('count');
		$Tachecount=$this->Tache->find('count');
		$Deviscount=$this->Devise->find('count');
		$Contratcount=$this->Contrat->find('count');
		$Facturecount=$this->Facture->find('count');
		$Commandecount=$this->Commande->find('count');
		
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'moderateur')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		$demandelu=$this->Demande->find('count',array('conditions'=>array('Demande.etat'=>'1')));
		$demandenonlu=$Demandecount-$demandelu;
		
		$servicepublier=$this->Service->find('count',array('conditions'=>array('Service.etat'=>'1')));
		$servicenonpublier=$Servicecount-$servicepublier;
		
		$produitpublier=$this->Produit->find('count',array('conditions'=>array('Produit.etat'=>'1')));
		$produitnonpublier=$Produitcount-$produitpublier;
		
		$pagepublier=$this->Consultation->find('count',array('conditions'=>array('Consultation.etat'=>'1')));
		$pagenonpublier=$Pagecount-$pagepublier;
		
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
		$matrerielcon=$this->Materiel->find('count',array('conditions'=>array('datef >='=>$date)));
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$comptarec=$this->Recette->find('count');
		$comptadep=$this->Depense->find('count');
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$stocksum = $this->Materiel->field('SUM(cout)');
		$stocksum = $this->Materiel->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$primessum = $this->Prime->field('SUM(prime)');
		$primessum = $this->Prime->field('SUM(prime)');
		
		$this->set(compact('Deviscount','Contratcount','Facturecount','Commandecount','Inventairecount','marques','familles','imputations','matrerielex','matrerielcon','entree','sortie','Usercount','Demandecount','Servicecount','Produitcount','Realisationcount','Clientcount','Employecount','Projetcount','Pagecount','Materielcount','Maintenancecount','Piececount','Primecount','Specialitecount','Vacancecount','Tachecount','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum','comptarec','comptadep','stocksum','bienssum','congessum','saliressum','primessum'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimergraphique');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimergraphique');
		}
	
	}
	public function imprimerhistogramme(){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
	$this->set('title_for_layout',"Statistiques | Histogramme");
	$this->layout = 'imprimer';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$Demandecount=$this->Demande->find('count');
		$Servicecount=$this->Service->find('count');
		$Produitcount=$this->Produit->find('count');
		$Realisationcount=$this->Realisation->find('count');
		$Clientcount=$this->Client->find('count');
		$Employecount=$this->Employe->find('count');
		$Projetcount=$this->Projet->find('count');
		$Inventairecount=$this->Inventaire->find('count');
		$Pagecount=$this->Consultation->find('count');
		$Materielcount=$this->Materiel->find('count');
		$Maintenancecount=$this->Maintenance->find('count');
		$Piececount=$this->Piece->find('count');
		$Primecount=$this->Prime->find('count');
		$Specialitecount=$this->Specialite->find('count');
		$Vacancecount=$this->Vacance->find('count');
		$Tachecount=$this->Tache->find('count');
		$Deviscount=$this->Devise->find('count');
		$Contratcount=$this->Contrat->find('count');
		$Facturecount=$this->Facture->find('count');
		$Commandecount=$this->Commande->find('count');
		
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'moderateur')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		$demandelu=$this->Demande->find('count',array('conditions'=>array('Demande.etat'=>'1')));
		$demandenonlu=$Demandecount-$demandelu;
		
		$servicepublier=$this->Service->find('count',array('conditions'=>array('Service.etat'=>'1')));
		$servicenonpublier=$Servicecount-$servicepublier;
		
		$produitpublier=$this->Produit->find('count',array('conditions'=>array('Produit.etat'=>'1')));
		$produitnonpublier=$Produitcount-$produitpublier;
		
		$pagepublier=$this->Consultation->find('count',array('conditions'=>array('Consultation.etat'=>'1')));
		$pagenonpublier=$Pagecount-$pagepublier;
		
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
		$matrerielcon=$this->Materiel->find('count',array('conditions'=>array('datef >='=>$date)));
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$comptarec=$this->Recette->find('count');
		$comptadep=$this->Depense->find('count');
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$stocksum = $this->Materiel->field('SUM(cout)');
		$stocksum = $this->Materiel->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$primessum = $this->Prime->field('SUM(prime)');
		$primessum = $this->Prime->field('SUM(prime)');
		
		$this->set(compact('Deviscount','Contratcount','Facturecount','Commandecount','Inventairecount','marques','familles','imputations','matrerielex','matrerielcon','entree','sortie','Usercount','Demandecount','Servicecount','Produitcount','Realisationcount','Clientcount','Employecount','Projetcount','Pagecount','Materielcount','Maintenancecount','Piececount','Primecount','Specialitecount','Vacancecount','Tachecount','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum','comptarec','comptadep','stocksum','bienssum','congessum','saliressum','primessum'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimerhistogramme');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimerhistogramme');
		}
	
	}
	public function histogramme(){
				$this->set('current_icon','icons/chart_line.png');
				$this->set('current_controller','statistiques');
				$this->set('current_controllername','Statistiques');
				$this->set('current_iconview','icons/chart_bar.png');
				$this->set('current_view','statistiques/histogramme');
				$this->set('current_iconviewname',"Histogramme");
				$this->set('title_for_layout',"Histogramme");
	$this->layout = 'admin';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$Demandecount=$this->Demande->find('count');
		$Servicecount=$this->Service->find('count');
		$Produitcount=$this->Produit->find('count');
		$Realisationcount=$this->Realisation->find('count');
		$Clientcount=$this->Client->find('count');
		$Employecount=$this->Employe->find('count');
		$Projetcount=$this->Projet->find('count');
		$Inventairecount=$this->Inventaire->find('count');
		$Pagecount=$this->Consultation->find('count');
		$Materielcount=$this->Materiel->find('count');
		$Maintenancecount=$this->Maintenance->find('count');
		$Piececount=$this->Piece->find('count');
		$Primecount=$this->Prime->find('count');
		$Specialitecount=$this->Specialite->find('count');
		$Vacancecount=$this->Vacance->find('count');
		$Tachecount=$this->Tache->find('count');
		$Deviscount=$this->Devise->find('count');
		$Contratcount=$this->Contrat->find('count');
		$Facturecount=$this->Facture->find('count');
		$Commandecount=$this->Commande->find('count');
		
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'moderateur')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		$demandelu=$this->Demande->find('count',array('conditions'=>array('Demande.etat'=>'1')));
		$demandenonlu=$Demandecount-$demandelu;
		
		$servicepublier=$this->Service->find('count',array('conditions'=>array('Service.etat'=>'1')));
		$servicenonpublier=$Servicecount-$servicepublier;
		
		$produitpublier=$this->Produit->find('count',array('conditions'=>array('Produit.etat'=>'1')));
		$produitnonpublier=$Produitcount-$produitpublier;
		
		$pagepublier=$this->Consultation->find('count',array('conditions'=>array('Consultation.etat'=>'1')));
		$pagenonpublier=$Pagecount-$pagepublier;
		
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
		$matrerielcon=$this->Materiel->find('count',array('conditions'=>array('datef >='=>$date)));
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$comptarec=$this->Recette->find('count');
		$comptadep=$this->Depense->find('count');
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$stocksum = $this->Materiel->field('SUM(cout)');
		$stocksum = $this->Materiel->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$primessum = $this->Prime->field('SUM(prime)');
		$primessum = $this->Prime->field('SUM(prime)');
		
		$this->set(compact('Deviscount','Contratcount','Facturecount','Commandecount','Inventairecount','marques','familles','imputations','matrerielex','matrerielcon','entree','sortie','Usercount','Demandecount','Servicecount','Produitcount','Realisationcount','Clientcount','Employecount','Projetcount','Pagecount','Materielcount','Maintenancecount','Piececount','Primecount','Specialitecount','Vacancecount','Tachecount','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum','comptarec','comptadep','stocksum','bienssum','congessum','saliressum','primessum'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/histogramme');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/histogramme');
		}
	
	}
	public function graphique(){
				$this->set('current_icon','icons/chart_line.png');
				$this->set('current_controller','statistiques');
				$this->set('current_controllername','Statistiques');
				$this->set('current_iconview','icons/chart_pie.png');
				$this->set('current_view','statistiques/graphique');
				$this->set('current_iconviewname',"Graphe");
				$this->set('title_for_layout',"Graphe");
	$this->layout = 'admin';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$Demandecount=$this->Demande->find('count');
		$Servicecount=$this->Service->find('count');
		$Produitcount=$this->Produit->find('count');
		$Realisationcount=$this->Realisation->find('count');
		$Clientcount=$this->Client->find('count');
		$Employecount=$this->Employe->find('count');
		$Projetcount=$this->Projet->find('count');
		$Inventairecount=$this->Inventaire->find('count');
		$Pagecount=$this->Consultation->find('count');
		$Materielcount=$this->Materiel->find('count');
		$Maintenancecount=$this->Maintenance->find('count');
		$Piececount=$this->Piece->find('count');
		$Primecount=$this->Prime->find('count');
		$Specialitecount=$this->Specialite->find('count');
		$Vacancecount=$this->Vacance->find('count');
		$Tachecount=$this->Tache->find('count');
		$Deviscount=$this->Devise->find('count');
		$Contratcount=$this->Contrat->find('count');
		$Facturecount=$this->Facture->find('count');
		$Commandecount=$this->Commande->find('count');
		
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'moderateur')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		$demandelu=$this->Demande->find('count',array('conditions'=>array('Demande.etat'=>'1')));
		$demandenonlu=$Demandecount-$demandelu;
		
		$servicepublier=$this->Service->find('count',array('conditions'=>array('Service.etat'=>'1')));
		$servicenonpublier=$Servicecount-$servicepublier;
		
		$produitpublier=$this->Produit->find('count',array('conditions'=>array('Produit.etat'=>'1')));
		$produitnonpublier=$Produitcount-$produitpublier;
		
		$pagepublier=$this->Consultation->find('count',array('conditions'=>array('Consultation.etat'=>'1')));
		$pagenonpublier=$Pagecount-$pagepublier;
		
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
		$matrerielcon=$this->Materiel->find('count',array('conditions'=>array('datef >='=>$date)));
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$comptarec=$this->Recette->find('count');
		$comptadep=$this->Depense->find('count');
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$stocksum = $this->Materiel->field('SUM(cout)');
		$stocksum = $this->Materiel->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$primessum = $this->Prime->field('SUM(prime)');
		$primessum = $this->Prime->field('SUM(prime)');
		
		$this->set(compact('Deviscount','Contratcount','Facturecount','Commandecount','Inventairecount','marques','familles','imputations','matrerielex','matrerielcon','entree','sortie','Usercount','Demandecount','Servicecount','Produitcount','Realisationcount','Clientcount','Employecount','Projetcount','Pagecount','Materielcount','Maintenancecount','Piececount','Primecount','Specialitecount','Vacancecount','Tachecount','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum','comptarec','comptadep','stocksum','bienssum','congessum','saliressum','primessum'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/graphique');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/graphique');
		}
	
	}
	public function index(){
				$this->set('current_icon','icons/chart_line.png');
				$this->set('current_controller','statistiques');
				$this->set('current_controllername','Statistiques');
				$this->set('current_iconview','icons/database_table.png');
				$this->set('current_view','statistiques');
				$this->set('current_iconviewname',"Tableur");
				$this->set('title_for_layout',"Tableur");
	$this->layout = 'admin';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$Demandecount=$this->Demande->find('count');
		$Servicecount=$this->Service->find('count');
		$Produitcount=$this->Produit->find('count');
		$Realisationcount=$this->Realisation->find('count');
		$Clientcount=$this->Client->find('count');
		$Employecount=$this->Employe->find('count');
		$Projetcount=$this->Projet->find('count');
		$Inventairecount=$this->Inventaire->find('count');
		$Pagecount=$this->Consultation->find('count');
		$Materielcount=$this->Materiel->find('count');
		$Maintenancecount=$this->Maintenance->find('count');
		$Piececount=$this->Piece->find('count');
		$Primecount=$this->Prime->find('count');
		$Specialitecount=$this->Specialite->find('count');
		$Vacancecount=$this->Vacance->find('count');
		$Tachecount=$this->Tache->find('count');
		$Deviscount=$this->Devise->find('count');
		$Contratcount=$this->Contrat->find('count');
		$Facturecount=$this->Facture->find('count');
		$Commandecount=$this->Commande->find('count');
		
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'moderateur')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		$demandelu=$this->Demande->find('count',array('conditions'=>array('Demande.etat'=>'1')));
		$demandenonlu=$Demandecount-$demandelu;
		
		$servicepublier=$this->Service->find('count',array('conditions'=>array('Service.etat'=>'1')));
		$servicenonpublier=$Servicecount-$servicepublier;
		
		$produitpublier=$this->Produit->find('count',array('conditions'=>array('Produit.etat'=>'1')));
		$produitnonpublier=$Produitcount-$produitpublier;
		
		$pagepublier=$this->Consultation->find('count',array('conditions'=>array('Consultation.etat'=>'1')));
		$pagenonpublier=$Pagecount-$pagepublier;
		
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
		$matrerielcon=$this->Materiel->find('count',array('conditions'=>array('datef >='=>$date)));
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$comptarec=$this->Recette->find('count');
		$comptadep=$this->Depense->find('count');
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$stocksum = $this->Materiel->field('SUM(cout)');
		$stocksum = $this->Materiel->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$primessum = $this->Prime->field('SUM(prime)');
		$primessum = $this->Prime->field('SUM(prime)');
		
		$this->set(compact('Deviscount','Contratcount','Facturecount','Commandecount','Inventairecount','marques','familles','imputations','matrerielex','matrerielcon','entree','sortie','Usercount','Demandecount','Servicecount','Produitcount','Realisationcount','Clientcount','Employecount','Projetcount','Pagecount','Materielcount','Maintenancecount','Piececount','Primecount','Specialitecount','Vacancecount','Tachecount','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum','comptarec','comptadep','stocksum','bienssum','congessum','saliressum','primessum'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/index');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/index');
		}
	
	}
	public function imprimers(){
	if($this->Session->read('Auth.User.imprimerliste')==0){
		$this->Session->setFlash($this->authmessage, 'default', array('id' => 'flashMessage', 'class' => 'notice'));
		$this->redirect(array('action'=>'index'));
	}
	$this->set('title_for_layout',"Statistiques | Tableur");
	$this->layout = 'imprimer';
	$date=date('Y-m-d');
		$Usercount=$this->User->find('count');
		$Demandecount=$this->Demande->find('count');
		$Servicecount=$this->Service->find('count');
		$Produitcount=$this->Produit->find('count');
		$Realisationcount=$this->Realisation->find('count');
		$Clientcount=$this->Client->find('count');
		$Employecount=$this->Employe->find('count');
		$Projetcount=$this->Projet->find('count');
		$Inventairecount=$this->Inventaire->find('count');
		$Pagecount=$this->Consultation->find('count');
		$Materielcount=$this->Materiel->find('count');
		$Maintenancecount=$this->Maintenance->find('count');
		$Piececount=$this->Piece->find('count');
		$Primecount=$this->Prime->find('count');
		$Specialitecount=$this->Specialite->find('count');
		$Vacancecount=$this->Vacance->find('count');
		$Tachecount=$this->Tache->find('count');
		$Deviscount=$this->Devise->find('count');
		$Contratcount=$this->Contrat->find('count');
		$Facturecount=$this->Facture->find('count');
		$Commandecount=$this->Commande->find('count');
		
		$useradmins=$this->User->find('count',array('conditions'=>array('User.role'=>'admin')));
		$useremployes=$this->User->find('count',array('conditions'=>array('User.role'=>'moderateur')));
		$userclients=$this->User->find('count',array('conditions'=>array('User.role'=>'client')));
		$useractive=$this->User->find('count',array('conditions'=>array('User.etat'=>'1')));
		$userinactive=$Usercount-$useractive;
		
		$demandelu=$this->Demande->find('count',array('conditions'=>array('Demande.etat'=>'1')));
		$demandenonlu=$Demandecount-$demandelu;
		
		$servicepublier=$this->Service->find('count',array('conditions'=>array('Service.etat'=>'1')));
		$servicenonpublier=$Servicecount-$servicepublier;
		
		$produitpublier=$this->Produit->find('count',array('conditions'=>array('Produit.etat'=>'1')));
		$produitnonpublier=$Produitcount-$produitpublier;
		
		$pagepublier=$this->Consultation->find('count',array('conditions'=>array('Consultation.etat'=>'1')));
		$pagenonpublier=$Pagecount-$pagepublier;
		
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
		$matrerielcon=$this->Materiel->find('count',array('conditions'=>array('datef >='=>$date)));
		$entree=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'entrée')));
		$sortie=$this->Stockaction->find('count',array('conditions'=>array('nom'=>'sortie')));
		
		$imputations=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'imputation')));
		$familles=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'marque')));
		$marques=$this->Stockcategorie->find('count',array('conditions'=>array('type'=>'famille')));
		
		$comptarec=$this->Recette->find('count');
		$comptadep=$this->Depense->find('count');
		
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		$recettesum = $this->Recette->field('SUM(total)');
		$depensesum = $this->Depense->field('SUM(payee)');
		
		$stocksum = $this->Materiel->field('SUM(cout)');
		$stocksum = $this->Materiel->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$bienssum = $this->Inventaire->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$congessum = $this->Vacance->field('SUM(cout)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$saliressum = $this->Employe->field('SUM(salaire)');
		$primessum = $this->Prime->field('SUM(prime)');
		$primessum = $this->Prime->field('SUM(prime)');
		
		$this->set(compact('Deviscount','Contratcount','Facturecount','Commandecount','Inventairecount','marques','familles','imputations','matrerielex','matrerielcon','entree','sortie','Usercount','Demandecount','Servicecount','Produitcount','Realisationcount','Clientcount','Employecount','Projetcount','Pagecount','Materielcount','Maintenancecount','Piececount','Primecount','Specialitecount','Vacancecount','Tachecount','useradmins','useremployes','userclients','useractive','userinactive','demandelu','demandenonlu','servicepublier','servicenonpublier','produitpublier','produitnonpublier','pagepublier','pagenonpublier','employemr','employemme','employemlle','projetterminer','projetencours','projetavenir','clients','fournisseurs','fabricants','smaintenance','sassurance','slocation','maintenanceterminer','maintenanceencours','vacanceterminer','vacanceencours','tacheterminer','tacheencours','employemv','employebn','employemy','employeex','employecinex','employecontex','invcontratg','invcontratm','invcontrata','invcontratl','contratg','contratm','contrata','contratl','contratt','contrate','devissans','devisaccepte','devisref','facturereg','facturenonreg','commandeae','commandear','recettesum','depensesum','comptarec','comptadep','stocksum','bienssum','congessum','saliressum','primessum'));
	
	if($this->Session->read('lang')=='ar'){
		$this->render('ar/imprimers');
		}
	else if($this->Session->read('lang')=='en'){
		$this->render('en/imprimers');
		}
	
	}
	

} // fin de "appcontroller"
?>