<header>
<?php  echo $this->element('top');?>



<nav> 
<?php if($this->Session->read('lang')=='ar'){ ?>
  <a href="<?=$this->Html->url('/users/enregistrer')?>" class="btn">تسجيل</a>
  <a href="<?=$this->Html->url('/users/login')?>" class="btn">دخول</a>
<?php } else if($this->Session->read('lang')=='en'){ ?>
  <a href="<?=$this->Html->url('/users/login')?>" class="btn">Login</a>
  <a href="<?=$this->Html->url('/users/enregistrer')?>" class="btn">Signup</a>
<?php }else{ ?>
  <a href="<?=$this->Html->url('/')?>" class="btn">Accueil</a>
  <a href="<?=$this->Html->url('/users/login')?>" class="btn">Se Sonnecter</a>
  <a href="<?=$this->Html->url('/')?>demandes/nouvelledemande" class="btn">Contact</a>
  <!--<a href="<?=$this->Html->url('/users/enregistrer')?>" class="btn">S'Enregistrer</a>-->
<?php } ?>
</nav>

 </div>

	<!--<div id="lineone" align="center">
		<div style="display:inline-block; ">				
				<ul class="mega-container mega-grey">
				<?php 
					 //echo $this->element('menu3');
				?>
				</ul>
		</div>
	</div>-->
	</header><div style="clear:both;"></div>
