<?php if($this->Session->read('lang')=='ar'){ ?>
	<li class="mega mega-current">				
					<a href="<?=$this->Html->url('/demandes/admin')?>" class="mega-link btn">
						 <?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>الطلبات
					</a>
					 			
	</li>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/shape_move_back.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons')); echo $config['Configuration']['servicestextar'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/services/tous')?>" >أرشيف</a>	</li>
						<li><a href="<?=$this->Html->url('/services/add')?>" >إضافة</a>	</li>
						<li><a href="<?=$this->Html->url('/services/recherche')?>" >بحث</a>	</li> 
					</ul>
				</div>	
	</li>	
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/package.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));  echo $config['Configuration']['produitstextar'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/produits/tous')?>" >أرشيف</a>	</li>
						<li><a href="<?=$this->Html->url('/produits/add')?>" >إضافة</a>	</li> 
						<li><a href="<?=$this->Html->url('/produits/recherche')?>" >بحث</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/feed.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons')); echo $config['Configuration']['nouveatestextar'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/consultations/tous')?>" >قائمة الصفحات</a>	</li>
						<li><a href="<?=$this->Html->url('/consultations/add')?>" >صفحة جديدة</a>	</li> 
						<li><a href="<?=$this->Html->url('/consultations/recherche')?>" >بحث</a>	</li> 
					</ul>
				</div>	
	</li>

<?php } else if($this->Session->read('lang')=='en'){ ?>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/feed.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons')); echo $config['Configuration']['nouveatestexten'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/consultations/tous')?>" >Pages Liste</a>	</li>
						<li><a href="<?=$this->Html->url('/consultations/add')?>" >Add page</a>	</li> 
						<li><a href="<?=$this->Html->url('/consultations/recherche')?>" >Search</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/package.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));  echo $config['Configuration']['produitstexten'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/produits/tous')?>" >Archive</a>	</li>
						<li><a href="<?=$this->Html->url('/produits/add')?>" >Add</a>	</li> 
						<li><a href="<?=$this->Html->url('/produits/recherche')?>" >Search</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/shape_move_back.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons')); echo $config['Configuration']['servicestexten'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/services/tous')?>" >Archive</a>	</li>
						<li><a href="<?=$this->Html->url('/services/add')?>" >Add</a>	</li>
						<li><a href="<?=$this->Html->url('/services/recherche')?>" >Search</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="<?=$this->Html->url('/demandes/admin')?>" class="mega-link btn">
						 <?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Requests
					</a>
					 			
	</li>	

<?php }else{ ?>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/feed.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons')); echo $config['Configuration']['nouveatestext'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/consultations/tous')?>" >Liste des Pages</a>	</li>
						<li><a href="<?=$this->Html->url('/consultations/add')?>" >Ajouter une Page</a>	</li> 
						<li><a href="<?=$this->Html->url('/consultations/recherche')?>" >Recherche</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/package.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));  echo $config['Configuration']['produitstext'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/produits/tous')?>" >Archive</a>	</li>
						<li><a href="<?=$this->Html->url('/produits/add')?>" >Ajouter</a>	</li> 
						<li><a href="<?=$this->Html->url('/produits/recherche')?>" >Rechercher</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="#" class="mega-link btn">
						<?php echo $this->Html->image('icons/shape_move_back.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons')); echo $config['Configuration']['servicestext'];?>
					</a>
				 <div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/services/tous')?>" >Archive</a>	</li>
						<li><a href="<?=$this->Html->url('/services/add')?>" >Ajouter</a>	</li>
						<li><a href="<?=$this->Html->url('/services/recherche')?>" >Rechercher</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
					<a href="<?=$this->Html->url('/demandes/admin')?>" class="mega-link btn">
						 <?php echo $this->Html->image('icons/email.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Demandes de devis
					</a>
					 			
	</li>	

<?php } ?>	
