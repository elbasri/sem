<table>
			<tr>
			<td><?php //echo $this->Html->image('icons/user.png')?> <a href="<?=$this->Html->url('/users/partenaires')?>"><?php echo $this->Html->image('images/system_partenaires.jpg', array('alt' => 'Systeme de partenaires','width'=>'140','height'=>'42','title'=>'Systeme de partenaires'));?></a> </td>
			<td><a href="<?=$this->Html->url('/users/profile');?>" title="Modifier votre profile sur votrecodeur.com" ><?php echo $this->Html->image('images/modifier_profile.jpg', array('alt' => 'Modifier votre profile sur votrecodeur.com','width'=>'140','height'=>'42','title'=>'Modifier votre profile sur votrecodeur.com'));?></a> &nbsp; <a href="<?=$this->Html->url('/users/logout')?>" title="se deconnecter de votre espace client sur votrecodeur.com" ><?php echo $this->Html->image('images/sedeconnecter.jpg', array('alt' => 'se deconnecter de votre espace client sur votrecodeur.com','width'=>'140','height'=>'42','title'=>'se deconnecter de votre espace client sur votrecodeur.com')); ?></a>
			</td>
			</tr>
			
			<tr>
			<td>
			<a href="<?=$this->Html->url('/users/voscommandes');?>" title="les commandes que vous avez fait sur votrecodeur.com" ><?php echo $this->Html->image('images/voscommandes.jpg', array('alt' => 'les commandes que vous avez fait sur votrecodeur.com','width'=>'140','height'=>'50','title'=>'les commandes que vous avez fait sur votrecodeur.com'));?></a> 
			</td>
			<td>
			<a href="<?=$this->Html->url('/users/voslogiciels');?>" title="les logiciels que vous avez commander sur votrecodeur.com" ><?php echo $this->Html->image('images/voslogiciels.jpg', array('alt' => 'les logiciels que vous avez commander sur votrecodeur.com','width'=>'140','height'=>'50','title'=>'les logiciels que vous avez commander sur votrecodeur.com'));?></a> 
			<a href="<?=$this->Html->url('/users/voscomposants')?>" title="les composants que vous avez commander sur votrecodeur.com" ><?php echo $this->Html->image('images/voscomposants.jpg', array('alt' => 'les composants que vous avez commander sur votrecodeur.com','width'=>'140','height'=>'50','title'=>'se les composants que vous avez commander sur votrecodeur.com')); ?></a>
			</td>
			</tr>
			</table>