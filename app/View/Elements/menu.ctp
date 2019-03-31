			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>users/site" class="mega-link btn">
					<?php echo $this->Html->image('icons/application_cascade.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Gestion du site web
				</a> 
			</li>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>users/entreprise" class="mega-link btn">
					<?php echo $this->Html->image('icons/computer.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Gestion d'Entreprise
				</a> 
			</li>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>statistiques" class="mega-link btn">
					<?php echo $this->Html->image('icons/chart_bar.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Statistiques
				</a> 
			</li>
			<li class="mega mega-current">				
				<a href="<?=$this->Html->url('/')?>configurations" class="mega-link btn">
					<?php echo $this->Html->image('icons/page_white_wrench.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?>Configurations
				</a> 
			</li>
<?php if($this->Session->read('Auth.User.role')=='admin'){?>	
	<li class="mega mega-current widthcent4">				
			<a href="<?=$this->Html->url('/users/tous')?>" class="mega-link btn widthcent2">
			<?php echo $this->Html->image('icons/status_offline.png', array('alt' => 'votrecodeur.com icons','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Utilisateurs</font>
			</a>
	</li>
 <?php } ?>