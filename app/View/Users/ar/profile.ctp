<div class="affichage">
<?php 
$titre=$users['User']['nom'];
$this->element('meta',array('titre'=>$titre));
?>


<div class="infosdemande" >
<table>
<tr>
<th>Votre code du client</th>
<th>Pseudo</th>
<th>Mot de passe</th>
<th>Action</th>
</tr>
<tr>
<td><?php echo $users['User']['id'];?></td>
<td><?php echo $users['User']['username'];?></td>
<td width="300">************</td>
<td><strong>
<?php 
echo $this->Html->link('Modifier Votre profile',array('controller'=>'users','action'=>'edit',$users['User']['id']));
?></strong>
</td>
</tr>
</table>
			<table >	

				<tr >
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td width="350">Votre Civilité: <strong><?php echo $users['User']['civilite'];?></strong>
					</td>
					
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com')); ?>
					</td>
					<td width="350">Votre Nom: <strong><?php echo $users['User']['nom'];?></strong>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Votre email: <strong><?php echo $users['User']['email'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Votre Téléphone: <strong><?php echo $users['User']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Votre societé: <strong><?php echo $users['User']['societe'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Votre Pays: <strong><?php echo $users['User']['pays'];?></strong>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Votre Ville: <strong><?php echo $users['User']['ville'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Créer un compte sur votrecodeur.com','title'=>'Créer un compte sur votrecodeur.com'));?></td>
					<td>Votre code postale: <strong><?php echo $users['User']['codep'];?></strong>
					</td>
					
					
				</tr>
			</table>								
		</div>	
		
</div>