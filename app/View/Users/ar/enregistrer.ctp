<div class="affichage" >

<?php echo $this->Form->create('User');?>


		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'votre pseudo','title'=>'votre pseudo')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'Votre pseudo'));?>
					</td>
					
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'votre mot de passe','title'=>'votre mot de passe')); ?>
					</td>
					<td><?php echo $this->Form->input('password',array('label'=>'Votre mot de passe')); echo $this->Form->input('role',array('value'=>'client','type'=>'hidden'));?>
					</td>
					
				</tr>
				
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td><?php echo $this->Form->input('civilite',array('label'=>'Civilité','options'=>array('Mr'=>'Mr','Mme'=>'Mme','Mlle'=>'Mlle')));?>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td><?php echo $this->Form->input('nom',array('id'=>'name','placeholder'=>'Votre Nom et Prénom'));?>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'email','placeholder'=>'Votre Adresse Email'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Numéro de Téléphone'));
					?>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('societe',array('id'=>'company_name','placeholder'=>'Votre Societé'));
					?>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('pays',array('id'=>'pays','placeholder'=>'Votre Pays'));
					?>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('ville',array('id'=>'Ville','placeholder'=>'La de Ville'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('codep',array('id'=>'codep','label'=>'Code Postale','placeholder'=>'Votre Code Postale'));
					?>
					</td>
					
					
				</tr>
			</table>								
		</div>	
	<table>
				<tr>
					<td>
					<div class="demandesec">
						<h3>Nous pouvons vous assurer à 100%  votre confidentialité et sécurité.</h3>
						
					</div>
					</td>
					
					<td>
					<!--<a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="img/images/bouton_envoyer_gris.jpg" /></a>-->
					
<?php echo $this->Form->end('Créer Un Compte'); ?>
					</td>
				</tr>
	</table>	
</div>