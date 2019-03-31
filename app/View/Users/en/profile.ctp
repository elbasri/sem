<div class="affichage">
<?php 
$titre=$users['User']['nom'];
$this->element('meta',array('titre'=>$titre));
?>


<div class="infosdemande" >
<table>
<tr>
<th>Your client code</th>
<th>Username</th>
<th>Password</th>
<th>Action</th>
</tr>
<tr>
<td><?php echo $users['User']['id'];?></td>
<td><?php echo $users['User']['username'];?></td>
<td width="300">************</td>
<td><strong>
<?php 
echo $this->Html->link('Edit your profile',array('controller'=>'users','action'=>'edit',$users['User']['id']));
?></strong>
</td>
</tr>
</table>
			<table >	

				<tr >
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image')); ?>
					</td>
					<td width="350">Your Civility: <strong><?php echo $users['User']['civilite'];?></strong>
					</td>
					
					<td width="50"><?php echo $this->Html->image('images/nomdemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image')); ?>
					</td>
					<td width="350">Your name: <strong><?php echo $users['User']['nom'];?></strong>
					</td>
					
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/emaildemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Your email: <strong><?php echo $users['User']['email'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/telephonedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Your phone: <strong><?php echo $users['User']['tel'];?></strong>
					</td>
				</tr>
				<tr>
				
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Votre Company: <strong><?php echo $users['User']['societe'];?></strong>
					</td>
					
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Votre Country: <strong><?php echo $users['User']['pays'];?></strong>
				</tr>
				<tr>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Votre Ville: <strong><?php echo $users['User']['ville'];?></strong>
					</td>
					<td><?php echo $this->Html->image('images/secietedemande.png', array('alt' => 'Gestory Image','title'=>'Gestory Image'));?></td>
					<td>Votre Postcode: <strong><?php echo $users['User']['codep'];?></strong>
					</td>
					
					
				</tr>
			</table>								
		</div>	
		
</div>