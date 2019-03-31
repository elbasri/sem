<div class="affichage" >

<?php echo $this->Form->create('User');?>


		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'your username','title'=>'your username')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'your username'));?>
					</td>
					
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'your password','title'=>'your password')); ?>
					</td>
					<td><?php echo $this->Form->input('password',array('label'=>'your password')); echo $this->Form->input('role',array('value'=>'client','type'=>'hidden'));?>
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
					<td><?php echo $this->Form->input('societe',array('id'=>'company_name','placeholder'=>'Votre Company'));
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
			</table>								
		</div>	
	<table>
				<tr>
					<td>
					<div class="demandesec">
						<h3>We can assure you 100% your privacy and security.</h3>
						
					</div>
					</td>
					
					<td>
					<!--<a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="img/images/bouton_envoyer_gris.jpg" /></a>-->
					
<?php echo $this->Form->end('Create Account'); ?>
					</td>
				</tr>
	</table>	
</div>