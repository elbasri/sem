<div class="affichage" align="center">
<h2>Modofication de mot de passe</h2>
<?php echo $this->Form->create('User');?>
		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'votre pseudo','title'=>'votre pseudo')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'Votre pseudo','type'=>'hidden'));?>
					<h1><?php echo $this->request->data['User']['username'];?></h1>
					</td>
					</tr>
					<tr>
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'votre mot de passe','title'=>'votre mot de passe')); ?>
					</td>
					<td><?php echo $this->Form->input('password',array('label'=>'Votre Nouveau mot de passe')); ?>
					</td>
				</tr>
				
			</table>								
		</div>	
<?php echo $this->Form->input('id',array('type' => 'hidden')); echo $this->Form->end('Modifier'); ?>
 </div>