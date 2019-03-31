<?php if($config['Configuration']['menu']==1){?>
	<?php if($this->Session->read('lang')=='ar'){ ?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>demandes/nouvelledemande" class="mega-link btn">
					<?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>طلب
				</a> 
			</li>
		<?php if($config['Configuration']['produits']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>produits/presentation" class="mega-link btn">
					<?php echo $this->Html->image('icons/basket.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['produitstextar'];?>
				</a> 
			</li>
		<?php } ?>	
		<?php if($config['Configuration']['services']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>services/presentation" class="mega-link btn">
					<?php echo $this->Html->image('icons/page_white_stack.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['servicestextar'];?>
				</a> 
			</li>
		<?php } ?>
		<?php if($config['Configuration']['nouveates']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>consultations/archive" class="mega-link btn">
					<?php echo $this->Html->image('icons/feed.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['nouveatestextar'];?>
				</a> 
			</li>
		<?php } ?>
	<?php } else if($this->Session->read('lang')=='en'){ ?>
		<?php if($config['Configuration']['nouveates']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>consultations/archive" class="mega-link btn">
					<?php echo $this->Html->image('icons/feed.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['nouveatestexten'];?>
				</a> 
			</li>
		<?php } ?>
		<?php if($config['Configuration']['services']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>services/presentation" class="mega-link btn">
					<?php echo $this->Html->image('icons/page_white_stack.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['servicestexten'];?>
				</a> 
			</li>
		<?php } ?>
		<?php if($config['Configuration']['produits']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>produits/presentation" class="mega-link btn">
					<?php echo $this->Html->image('icons/basket.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['produitstexten'];?>
				</a> 
			</li>
		<?php } ?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>demandes/nouvelledemande" class="mega-link btn">
					<?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Request
				</a> 
			</li>		
	<?php }else{ ?>
		<?php if($config['Configuration']['nouveates']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>consultations/archive" class="mega-link btn">
					<?php echo $this->Html->image('icons/feed.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['nouveatestext'];?>
				</a> 
			</li>
		<?php } ?>
		<?php if($config['Configuration']['services']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>services/presentation" class="mega-link btn">
					<?php echo $this->Html->image('icons/page_white_stack.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['servicestext'];?>
				</a> 
			</li>
		<?php } ?>
		<?php if($config['Configuration']['produits']==1){?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>produits/presentation" class="mega-link btn">
					<?php echo $this->Html->image('icons/basket.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><?php echo $config['Configuration']['produitstext'];?>
				</a> 
			</li>
		<?php } ?>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>demandes/nouvelledemande" class="mega-link btn">
					<?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Demande
				</a> 
			</li>
	<?php } ?>	
		
<?php }
if($this->Session->read('Auth.User.id')){
if($this->Session->read('lang')=='ar'){
?>
	<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/users/logout')?>" class="mega-link btn">
					<?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>خروج
				</a> 
	</li>
<?php } else if($this->Session->read('lang')=='en'){ ?>
	<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/users/logout')?>" class="mega-link btn">
					<?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Logout
				</a> 
	</li>
<?php } else{ ?>
	<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/users/logout')?>" class="mega-link btn">
					<?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Déconnecter
				</a> 
	</li>
<?php } } ?>
