<div class="affichage" >
<?php echo $this->Form->create('User');?>
		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'your username','title'=>'your username')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'your username','type'=>'hidden'));?>
					<h1><?php echo $this->request->data['User']['username'];?></h1>
					</td>
					
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'your password','title'=>'your password')); ?>
					</td>
					<td><strong><?php echo $this->Html->link('Click here to change your password',array('controller'=>'users','action'=>'passe',$this->request->data['User']['id'])); ?></strong>
					</td>
					
				</tr>
				
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image')); ?>
					</td>
					<td><?php echo $this->Form->input('civilite',array('label'=>'Civility','options'=>array('Mr'=>'Mr','Mme'=>'Mrs','Mlle'=>'Ms')));?>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image')); ?>
					</td>
					<td><?php echo $this->Form->input('nom',array('id'=>'name','placeholder'=>'Your name'));?>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'email','placeholder'=>'Your Email'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Phone number'));
					?>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><?php echo $this->Form->input('societe',array('id'=>'company_name','placeholder'=>'Your Company'));
					?>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><?php echo $this->Form->input('pays',array('id'=>'pays','label'=>'Country','placeholder'=>'your Country'));
					?>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><?php echo $this->Form->input('ville',array('id'=>'Ville','label'=>'City','placeholder'=>'City'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td><?php echo $this->Form->input('codep',array('id'=>'codep','label'=>'Postcode','placeholder'=>'Your Postcode'));
					?>
					</td>
					
					
				</tr>
				<tr>
				<td></td>
				<td>
				<?php
				if($this->Session->read('Auth.User.role')=='admin')
					echo $this->Form->input('role',array('label'=>'The type of user','options'=>array('admin'=>'Admin','moderateur'=>'Moderator','client'=>'Customer')));
				?>
				</td>
				<td></td>
				<td></td>
				</tr>
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
			</table>								
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
<?php 
/*if($this->Session->read('Auth.User.role')=='admin')
	echo $this->Form->input('role',array('label'=>'The type of user','options'=>array('admin'=>'Admin','moderateur'=>'Moderator','client'=>'Customer')));
if($this->Session->read('Auth.User.role')=='admin')
	echo $this->Form->input('etat',array('label'=>'L\'etat de l\'utilisateur','options'=>array('0'=>'innactif','1'=>'actif')));*/
//if($this->Session->read('Auth.User.id')=='1')
	//echo $this->Form->input('part',array('label'=>'Partenaire?','options'=>array('0'=>'Non','1'=>'Oui')));
echo $this->Form->input('id',array('type' => 'hidden'));
 echo $this->Form->end('Edit'); ?>
 </div>