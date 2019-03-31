<?php
$tablet_browser = 0;
$mobile_browser = 0;
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
 
if ($tablet_browser > 0 || $mobile_browser > 0) {
 echo '<div class="affichage">';
}
else {
?>
<div class="menudetails">
 <?php echo $this->element('menudetails',array('type'=>'users')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 

<?php echo $this->Form->create('User');?>


		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'votre pseudo','title'=>'Le pseudo')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'Le pseudo'));?>
					</td>
					
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'votre mot de passe','title'=>'Le mot de passe')); ?>
					</td>
					<td><?php echo $this->Form->input('password',array('label'=>'Le mot de passe'));?>
					</td>
					
				</tr>
				
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td><?php echo $this->Form->input('civilite',array('label'=>'Civilité','options'=>array('Mr'=>'Mr','Mme'=>'Mme','Mlle'=>'Mlle')));?>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td><?php echo $this->Form->input('nom',array('id'=>'name','placeholder'=>'Le Nom et Prénom'));?>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'email','placeholder'=>'L\'Adresse Email'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Numéro de Téléphone'));
					?>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('societe',array('id'=>'company_name','placeholder'=>'La Societé'));
					?>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('pays',array('id'=>'pays','placeholder'=>'Le Pays'));
					?>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('ville',array('id'=>'Ville','placeholder'=>'la Ville'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('codep',array('id'=>'codep','label'=>'Code Postale','placeholder'=>'Le Code Postale'));
					?>
					</td>
					
					
				</tr>
				<tr>
				<td></td>
				<td>
				<?php
				if($this->Session->read('Auth.User.role')=='admin')
					echo $this->Form->input('role',array('label'=>'Le type de l\'utilisateur','options'=>array('admin'=>'Admin','moderateur'=>'Moderateur','client'=>'Client')));
				else
					echo $this->Form->input('role',array('label'=>'Le type de l\'utilisateur','options'=>array('client'=>'Client')));
				?>
				</td>
				<td></td>
				<td></td>
				</tr>
			</table>
		<?php if($this->Session->read('Auth.User.id')=='1'){?>
		<h2>Accès</h2>
			<table>
				<tr>
				<td><?php  echo $this->Form->input('limites',array('label'=>'Les accès','options'=>array('0'=>'Tous','1'=>'L\'entreprise','2'=>'Le site web','3'=>'Accès particuliers'),'onchange'=>'OnSelectionChange (this)'));?>
				</td>
				<td><?php echo $this->Form->input('etat',array('label'=>'Statut','options'=>array('0'=>'innactif','1'=>'actif')));?>
				</td>
				</tr>
			</table>
		<h2>Droits</h2>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('add',array('label' => 'Ajout &nbsp; &nbsp; &nbsp; &nbsp;','type'=>'checkbox',));?>
					</td>
					<td><?php echo $this->Form->input('delete',array('label' => 'Suppression','type'=>'checkbox'));?>
					</td>
					<td><?php echo $this->Form->input('edit',array('label' => 'Modification','type'=>'checkbox'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('recherche',array('label' => 'Recherche','type'=>'checkbox'));?>
					</td>
					<td><?php echo $this->Form->input('imprimer',array('label' => 'Impression et Exportation de dossiers','type'=>'checkbox'));?>
					</td>
					<td><?php echo $this->Form->input('imprimerliste',array('label' => 'Impression et Exportation de listes','type'=>'checkbox'));?>
					</td>
				</tr>
			</table>
		<div style="display:none" id="vers">
		<h2>Accès particuliers [Entreprise]</h2><br>
		<h3>&nbsp; -Ressources humaines</h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Employes',array('label' => 'Employes','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Specialites',array('label' => 'Spécialités','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Taches',array('label' => 'Tâches','type'=>'checkbox',));?>
					</td>
				</tr>
				<tr>
					<td ><?php echo $this->Form->input('Primes',array('label' => 'Primes','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Specialites',array('label' => 'Congés','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Taches',array('label' => 'Tâches','type'=>'checkbox',));?>
					</td>
				</tr>
				<tr>
					<td ><?php echo $this->Form->input('Paies',array('label' => 'Paies','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -Stock </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Materiels',array('label' => 'Articles','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Stockactions',array('label' => 'Journale','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Maintenances',array('label' => 'Maintenances','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -Inventaire </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Inventaires',array('label' => 'Les biens','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -Classifications </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Pieces',array('label' => 'Localisations et Magasins','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Stockcategories',array('label' => 'Classifications (familles, marques..)','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -CRM et Contacts </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Clients',array('label' => 'Contacts (clients, fournisseurs..)','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Contrats',array('label' => 'Contrats','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -Gestion de projets </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Projets',array('label' => 'Projets','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Realisations',array('label' => 'Réalisations','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -Gestion commerciale </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Devis',array('label' => 'Devises','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Factures',array('label' => 'Factures et Bon de livraison','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Commandes',array('label' => 'Commandes','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h3>&nbsp; -Comptabilité </h3>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Depenses',array('label' => 'Dépenses','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Recettes',array('label' => 'Recettes','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Saisirs',array('label' => 'Saisie Débit/Crédit','type'=>'checkbox',));?>
					</td>
				</tr>
				<tr>
					<td ><?php echo $this->Form->input('Kilometrages',array('label' => 'Kilométrage','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Deplacements',array('label' => 'Indemnités de déplacement','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Comptes',array('label' => 'Comptes bancaires','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		<h2>Accès particuliers [Site Web]</h2><br>
			<table>
				<tr>
					<td ><?php echo $this->Form->input('Consultations',array('label' => 'Nouveautés','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Produits',array('label' => 'Produits','type'=>'checkbox',));?>
					</td>
				</tr>
				<tr>
					<td ><?php echo $this->Form->input('Services',array('label' => 'Services','type'=>'checkbox',));?>
					</td>
					<td ><?php echo $this->Form->input('Demandes',array('label' => 'Demandes de devis','type'=>'checkbox',));?>
					</td>
				</tr>
			</table>
		</div>
		<?php }?>								
		</div>	
<script type="text/javascript">
	function OnSelectionChange (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="3"){
				document.getElementById('vers').style.display="block";
			}else {
            document.getElementById('vers').style.display="none";
			}
        }
    </script>		
<?php echo $this->Form->end('Créer Un Compte'); ?>
	
</div>