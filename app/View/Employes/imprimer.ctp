<div class="affichage">
<?php 
$titre=$user['Employe']['nom'];
$this->element('meta',array('titre'=>$titre));

$img = $user['Employe']['img'];
?>

	<div class="infosdemande" >
		
			<table >
			<?php if(!empty($user['Employe']['img'])){?>
				<tr >
					<td style="width:5%">
					</td>
					<td style="width:35%"><img src="<?php echo $img;?>" style="width:50%;height:60%"/>
					<?php //echo $this->Html->image($img, array('alt' => '','style'=>'width:50%;height:60%;'));?>
					</td>
					
					<td style="width:5%"></td>
					<td style="width:35%">Nom: <strong><?php echo $user['Employe']['nom'];?></strong>
					<br><br>Prénom: <strong><?php echo $user['Employe']['prenom'];?></strong>
					<br><br>CIN: <strong><?php echo $user['Employe']['cin'];?></strong>
					<br><br>Date d'expiration de CIN: <strong><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']) echo "<br><font color='red'>CIN expiré</font>";?></strong>
					<br><br>Date de naissance: <strong><?php echo $user['Employe']['datenaissance'];?></strong>
					</td>
					
				</tr>
				<?php }else{?>
				<tr >
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe')); ?>
					</td>
					<td style="width:35%">Nom: <strong><?php echo $user['Employe']['nom'];?></strong>
					</td>
					
					<td style="width:5%"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td style="width:35%">Prénom: <strong><?php echo $user['Employe']['prenom'];?></strong>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe')); ?>
					</td>
					<td>CIN: <strong><?php echo $user['Employe']['cin'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Date d'expiration de CIN: <strong><?php echo $user['Employe']['cinend']; if(date('Y-m-d')>$user['Employe']['cinend']) echo "<br><font color='red'>CIN expiré</font>";?></strong>
					</td>
					
				</tr>
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Date de naissance: <strong><?php echo $user['Employe']['datenaissance'];?></strong>
					</td>
					
					<td></td>
					<td></td>
					
				</tr>
				
				<?php }?>
				<tr>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe')); ?>
					</td>
					<td>Civilité: <strong><?php echo $user['Employe']['civilite'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Téléphone: <strong><?php echo $user['Employe']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Le Pays/Nationalité: <strong><?php echo $user['Employe']['pays'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Ville: <strong><?php echo $user['Employe']['ville'];?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Code Postale: <strong><?php echo $user['Employe']['codep'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Adresse: <strong><?php echo $user['Employe']['adressepostale'];?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Date de début du contrat: <strong><?php echo $user['Employe']['datetravail'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Date de fin du contrat: <strong><?php echo $user['Employe']['datefintravail']; if(date('Y-m-d')>$user['Employe']['datefintravail']) echo "<br><font color='red'>Contrat expiré</font>";?></strong>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Spécialité: <strong><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></strong>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => '','title'=>'ajouter un employe'));?></td>
					<td>Salaire: <strong><?php if($user['Employe']['salaire']!=0) echo $user['Employe']['salaire']." ".$config['Configuration']['Devises']; else echo "indéfinie";?></strong>
					</td>
				</tr>
				
				<tr>
					<?php if($user['Employe']['cnss']!=0){?>
					<td><?php echo $this->Html->image('icons/lock.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td>N° de sécurité sociale : <strong><?php echo $user['Employe']['cnss'];?></strong>
					</td>
					<?php } if($user['Employe']['matricule']!=0){?>
					<td><?php echo $this->Html->image('icons/lock.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td>Matricule : <strong><?php echo $user['Employe']['matricule'];?></strong>
					</td>
					<?php }?>
				</tr>
				<?php if(!empty($user['Employe']['contrat'])){?>
				<tr>
					<td><?php echo $this->Html->image('icons/page_white_acrobat.png', array('alt' => '','title'=>'','width'=>'20'));?></td>
					<td><strong><a href="<?php echo $user['Employe']['contrat'];?>">Cliquer ici pour télécharger le contrat</a></strong>
					</td>
					<td></td>
					<td>
					</td>
				</tr>
				<?php }?>
			</table>	
	</div>	
		<?php echo "<script>window.print();</script>";?>
</div>