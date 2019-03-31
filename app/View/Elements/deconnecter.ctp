<table ><?php if($this->Session->read('lng')=='fr'){ ?>
			<tr><td><?php echo $this->Html->image('icons/user.png')?> <strong style="font-size:14px"> Bienvenue Cher Client</strong></td></tr>
			<tr><td>
			<a href="<?=$this->Html->url('/users/login')?>" title="se connecter sur votre espace client sur votrecodeur.com" ><?php echo $this->Html->image('images/seconnecter.png', array('alt' => 'se connecter sur votre espace client sur votrecodeur.com','width'=>'150','height'=>'40','title'=>'se connecter sur votre espace client sur votrecodeur.com'));?></a> 
			<a href="<?=$this->Html->url('/users/enregistrer')?>" title="créer un compte client sur votrecodeur.com" ><?php echo $this->Html->image('images/senregistrer.png', array('alt' => 'créer un compte client sur votrecodeur.com','width'=>'150','height'=>'40','title'=>'créer un compte client sur votrecodeur.com')); ?></a>
			</td></tr>
			<tr>
			<td >
			
			<div align="left"><?php echo $this->Html->image('images/enchange.png', array('alt' => 'Change language','width'=>'150','height'=>'40','title'=>'Change language')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?=$this->Html->url('/composants/en')?>"><?php echo $this->Html->image('images/en.png', array('alt' => 'Chose th English language','width'=>'50','height'=>'40','title'=>'Chose th English language')); ?></a>&nbsp;&nbsp;
			<a href="<?=$this->Html->url('/composants/fr')?>"><?php echo $this->Html->image('images/frtrue.png', array('alt' => 'Choisir la langue français','width'=>'50','height'=>'40','title'=>'Choisir la langue français')); ?></a>
			</div>
			
			</td>
			
			</tr>
			
			<?php } else{ ?>
			<tr><td><?php echo $this->Html->image('icons/user.png')?> <strong style="font-size:14px"> Welcome Dear Customer</strong></td></tr>
			<tr><td>
			<a href="<?=$this->Html->url('/users/login')?>" title="se connecter sur votre espace client sur votrecodeur.com" ><?php echo $this->Html->image('images/login.png', array('alt' => 'Login to your VotreCodeur account','width'=>'150','height'=>'40','title'=>'Login to your VotreCodeur account'));?></a> 
			<a href="<?=$this->Html->url('/users/enregistrer')?>" title="créer un compte client sur votrecodeur.com" ><?php echo $this->Html->image('images/signup.png', array('alt' => 'Create your VotreCodeur account','width'=>'150','height'=>'40','title'=>'Create your VotreCodeur account')); ?></a>
			</td></tr>
			<tr>
			<td >
			
			<div align="left"><?php echo $this->Html->image('images/frchange.png', array('alt' => 'Change language','width'=>'150','height'=>'40','title'=>'Change language')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?=$this->Html->url('/composants/en')?>"><?php echo $this->Html->image('images/entrue.png', array('alt' => 'Chose th English language','width'=>'50','height'=>'40','title'=>'Chose th English language')); ?></a>&nbsp;&nbsp;
			<a href="<?=$this->Html->url('/composants/fr')?>"><?php echo $this->Html->image('images/fr.png', array('alt' => 'Choisir la langue français','width'=>'50','height'=>'40','title'=>'Choisir la langue français')); ?></a>
			</div>
			
			</td>
			
			</tr>
			<?php }?>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50182e7b58d55042" async></script>
			</table>
			