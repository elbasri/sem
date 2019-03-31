<!--<form name="quote" id="enquiryformpage" action="demandeenvoyer" method="post" >-->
<?php
$titre='Pour entrer en contact pour les services sil vous plaît contacter à demande@votrecodeur.com ou simplement nous appeler au +212 676 47 95 81 Vous pouvez également nous envoyer un courriel pour demander un service particulier par remplissage le formulaire au-dessous.';
$this->element('meta',array('titre'=>$titre));
?>
<div class="affichage" >
<?php echo $this->Form->create('Demande');?>
	<h2>Demande de Devis</h2>
		<p style="padding-left:20px;">
			<strong>
			<?php echo $config['Configuration']['contacttext'];?>
			</strong>
		</p>
	<br>
		<h2>Détails du devis demandé </h2>
		<div class="projetdemande" >
				
				<?php echo $this->Form->input('titre'); 
				echo $this->Form->input('details',array('rows' => '3','id'=>'sujet'));?>
		</div>						
						 
	<h2>Vos informations de contact</h2>
		<div class="infosdemande" >
			<table >	
				<tr >
					<td><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com')); ?></td>
					<td><?php echo $this->Form->input('nom',array('id'=>'name','placeholder'=>'Your name'));
					?>
					
					</td>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('email',array('id'=>'email','placeholder'=>'Your Email'));
					?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('societe',array('id'=>'company_name','placeholder'=>'Your Company'));
					?>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'envoyer un demande sur votrecodeur.com','title'=>'envoyer un demande sur votrecodeur.com'));?></td>
					<td><?php echo $this->Form->input('tel',array('id'=>'phone','placeholder'=>'Phone number'));
					?>
					</td>
				</tr>
			</table>								
		</div>	
<br>
				
				<table>
				<tr>
					<td>
					<div class="demandesec">
						<h3>We can assure you 100% your privacy and security.</h3>
						
					</div>
					</td>
					
					<td>
					<!--<a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="img/images/bouton_envoyer_gris.jpg" /></a>-->
					<?php echo $this->Form->end('Envoyer');?>
					</td>
				</tr>
				</table>		
</div>

