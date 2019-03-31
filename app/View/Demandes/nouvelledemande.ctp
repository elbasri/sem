<!--<form name="quote" id="enquiryformpage" action="demandeenvoyer" method="post" >-->
<?php
$titre='Vous pouvez nous envoyer un courriel par remplissage le formulaire au-dessous.';
$this->element('meta',array('titre'=>$titre));
?>
<div class="affichage" >
<?php echo $this->Form->create('Demande');?>
	<!--<h2>Demande de Devis</h2>
		<p style="padding-left:20px;">
			<strong>
			<?php echo $config['Configuration']['contacttext'];?>
			</strong>
		</p>
	<br>-->					
						 
	<h2>Vos informations de contact</h2>
		<div class="infosdemande" >
			<table >	
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com')); ?></td>
					<td><?php echo $this->Form->input('nom',array('id'=>'name','placeholder'=>'Votre Nom'));
					?>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('societe',array('id'=>'company_name','placeholder'=>'Votre Prénom','label'=>'Prénom'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'email','placeholder'=>'Votre Adresse Email'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Numéro de Téléphone'));
					?>
					</td>
				</tr>

			</table>								
		</div>	
		
		<h2>Détails du message</h2>
		<div class="projetdemande" >
				
				<?php echo $this->Form->input('titre',array('label'=>'Sujet')); 
				echo $this->Form->input('details',array('rows' => '3','label'=>'Message'));?>
		</div>	
<br>
				
				<table>
				<tr>
					
					<td width="100%" style="text-align:center">
					<!--<div class="demandesec">
						<h3>Nous pouvons vous assurer à 100%  votre confidentialité et sécurité.</h3>
						
					</div>-->
						<?php echo $this->Form->end('Envoyer');?>
					</td>
					
					<!--<td width="50%" >
					<a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="img/images/bouton_envoyer_gris.jpg" /></a>
					
					</td>-->
				</tr>
				</table>		
</div>

