<header>

<?php  echo $this->element('top');?>

<nav> 
<?php if($this->Session->read('lang')=='ar'){ ?>
  <a href="<?=$this->Html->url('/demandes/mesdevis')?>" class="btn" >طلباتي</a> 
  <a href="<?=$this->Html->url('/users/profile')?>" class="btn" >ملفي</a>
  
<?php } else if($this->Session->read('lang')=='en'){ ?>
  <a href="<?=$this->Html->url('/demandes/mesdevis')?>" class="btn" >My Requests</a> 
  <a href="<?=$this->Html->url('/users/profile')?>" class="btn" >Profile</a>
			
<?php }else{ ?>
  <a href="<?=$this->Html->url('/demandes/mesdevis')?>" class="btn" >Mes tiquettes</a> 
  <a href="<?=$this->Html->url('/users/profile')?>" class="btn" >Profil</a>
  <a href="<?=$this->Html->url('/users/logout')?>" class="btn" >Se déconnecter</a>
			
<?php } ?>
  
</nav>

<!--<div class="download"> 
<?php if($config['Configuration']['en']==1){ ?><a href="<?=$this->Html->url('/users/en')?>"><?php echo $this->Html->image('images/en.png', array('alt' => 'Choose the English language','width'=>'40','height'=>'40','title'=>'Chose the English language')); ?></a>&nbsp;<?php } ?>
<?php if($config['Configuration']['fr']==1){ ?><a href="<?=$this->Html->url('/users/fr')?>"><?php echo $this->Html->image('images/fr.png', array('alt' => 'Choisir la langue français','width'=>'40','height'=>'40','title'=>'Choisir la langue français')); ?></a><?php } ?>
<?php if($config['Configuration']['ar']==1){ ?><a href="<?=$this->Html->url('/users/ar')?>"><?php echo $this->Html->image('images/ar.png', array('alt' => 'Choisir la langue français','width'=>'40','height'=>'40','title'=>'إختر اللغة العربية')); ?></a><?php } ?>
</div>-->


	</header><div style="clear:both;"></div>
	<?php if($this->Session->read('Auth.User.role')!='client'){?>
	<div id="lineone" align="center">
		<div style="display:inline-block; ">				
				<ul class="mega-container mega-grey">
				<?php 
					 echo $this->element('menu2');
				?>
				</ul>
		</div>
		<!-- <div style="display:inline-block; ">				
			<ul class="mega-container mega-grey">
			<?php 
			/*if($this->Session->read('type')=='site')
				 echo $this->element('site');
			else*/
				 //echo $this->element('entreprise');
			?>
			</ul>
		</div>
		 <div style="display:inline-block; ">				
			<ul class="mega-container mega-grey">
			<?php 
			/*if($this->Session->read('type')!='site')
				 echo $this->element('entreprise2');*/
			?>
			</ul>
		</div>-->
	</div>
 <?php } else { ?>
 	<div id="lineone" align="center">
		<div style="display:inline-block; ">				
				<ul class="mega-container mega-grey">
				<?php 
					 echo $this->element('menu3');
				?>
				</ul>
		</div>
	</div>
<?php }?>