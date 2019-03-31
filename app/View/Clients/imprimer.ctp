<div class="affichage">
<?php 
$titre=$user['Client']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
		
			<table >
				<tr >
					<td style="width:5%"><?php echo $this->Html->image('icons/username.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe')); ?>
					</td>
					<td style="width:35%">Référence: <strong><?php echo $user['Client']['ref'];?></strong>
					</td>
					
					<td style="width:5%"></td>
					<td style="width:35%">
					</td>
					
				</tr>
				<tr>
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe')); ?>
					</td>
					<td style="width:35%">Societé: <strong><?php echo $user['Client']['nom'];?></strong>
					</td>
					
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Le Prénom','title'=>'ajouter un employe'));?></td>
					<td style="width:35%">Contact: <strong><?php echo $user['Client']['civilite']." ".$user['Client']['prenom'];?></strong>
					</td>
					
				</tr>
				
				<tr>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Téléphone: <strong><?php echo $user['Client']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Pays: <strong><?php echo $user['Client']['pays'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Ville: <strong><?php echo $user['Client']['ville'];?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Code Postale: <strong><?php echo $user['Client']['codep'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Adresse: <strong><?php echo $user['Client']['adressepostale'];?></strong>
					</td>
				</tr>

				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'ajouter un employe','title'=>'ajouter un employe'));?></td>
					<td>Email: <strong><?php echo $user['Client']['email'];?></strong>
					</td>
					<td></td>
					<td></td>
				</tr>

			</table>
<?php echo "<script>window.print();</script>";?>			
	</div>	
		
</div>