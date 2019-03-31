<header>
<?php  echo $this->element('top');?>
<nav> 
  <a href="<?=$this->Html->url('/users/accueil')?>" class="btn" >Accueil</a>
  <a href="<?=$this->Html->url('/demandes/mesdevis')?>" class="btn" >Mes demande</a>
  <a href="<?=$this->Html->url('/users/profile')?>" class="btn" >Profile</a> 
  
  
</nav>

<div class="download">
<a href="<?=$this->Html->url('/users/logout')?>" class="btn" >Se Déconnecter</a>
</div>
</div>
<?php if($this->Session->read('Auth.User.role')!='client'){?>
<div id="lineone" align="center">
	<div style="display:inline-block; ">				
		<ul class="mega-container mega-grey">
			<?php echo $this->element('menu');?>
		</ul>
	</div>
</div>

 <?php } ?>
	</header><div style="clear:both;"></div>