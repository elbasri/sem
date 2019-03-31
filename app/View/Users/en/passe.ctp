<div class="affichage" align="center">
<h2>Changing the password</h2>
<?php echo $this->Form->create('User');?>
		<div class="infosdemande" >
		
			<table >	
			
				<tr >
					<td><?php echo $this->Html->image('icons/username.png', array('alt' => 'your username','title'=>'your username')); ?>
					</td>
					<td><?php echo $this->Form->input('username',array('label'=>'your username','type'=>'hidden'));?>
					<h1><?php echo $this->request->data['User']['username'];?></h1>
					</td>
					</tr>
					<tr>
					<td><?php echo $this->Html->image('icons/password.png', array('alt' => 'your password','title'=>'your password')); ?>
					</td>
					<td><?php echo $this->Form->input('password',array('label'=>'Votre Nouveau mot de passe')); ?>
					</td>
				</tr>
				
			</table>								
		</div>	
<?php echo $this->Form->input('id',array('type' => 'hidden')); echo $this->Form->end('Edit'); ?>
 </div>