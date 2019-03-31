<?php if($this->Session->read('lang')=='ar'){ ?>
			
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/add.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">المزيد</font>
				</a> 
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/')?>statistiques" >إحصائيات</a>	</li>
							<li><a href="<?=$this->Html->url('/')?>configurations" >إعدادات</a>	</li>
							<li><a href="<?=$this->Html->url('/')?>evennements" >الأحداث</a>	</li>
							<li><a href="#" onclick="openFileBrowserSliderFile(); return false;" >مركز التحميل</a>	</li>
							<li><a href="<?=$this->Html->url('/')?>annuaires/admin" >الدليل الخاص</a>	</li>
							<li><a href="<?=$this->Html->url('/aides/view')?>" >المساعدة</a>	</li>
							<li><a href="<?=$this->Html->url('/statuts/view')?>" >الحالة</a>	</li> 
							<li><a href="<?=$this->Html->url('/mises/view')?>" >التحديثات</a>	</li>
							<li><a href="<?=$this->Html->url('/users/logout')?>" >تسجيل الخروج</a>	</li>
						</ul>
					</div>
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>alertes" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/bell.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">التنبيهات</font>
				</a> 
			</li>
<?php //if($this->Session->read('Auth.User.role')=='admin'){?>	
	<li class="mega mega-current widthcent4">				
			<a href="<?=$this->Html->url('/users/tous')?>" class="mega-link btn widthcent2">
			<?php echo $this->Html->image('icons/status_offline.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">المستخدمين</font>
			</a>
	</li>
 <?php //} ?>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>users/site" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/application_cascade.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">الموقع الإلكتروني</font>
				</a> 
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>users/entreprise" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/computer.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">المقاولة</font>
				</a> 
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/users/accueil')?>" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/house_go.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">الرئيسية</font>
				</a> 
			</li>

<?php } else if($this->Session->read('lang')=='en'){ ?>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/users/accueil')?>" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/house_go.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Home</font>
				</a> 
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>users/entreprise" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/computer.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Company</font>
				</a> 
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>users/site" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/application_cascade.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Website</font>
				</a> 
			</li>
<?php //if($this->Session->read('Auth.User.role')=='admin'){?>	
	<li class="mega mega-current widthcent4">				
			<a href="<?=$this->Html->url('/users/tous')?>" class="mega-link btn widthcent2">
			<?php echo $this->Html->image('icons/status_offline.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Users</font>
			</a>
	</li>
 <?php //} ?>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>alertes" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/bell.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Alerts</font>
				</a> 
			</li>
			
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/add.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">More</font>
				</a> 
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/')?>statistiques" >Statistics</a>	</li>
							<li><a href="<?=$this->Html->url('/')?>configurations" >Configuration</a>	</li>
							<li><a href="<?=$this->Html->url('/')?>evennements" >Events</a>	</li>
							<li><a href="#" onclick="openFileBrowserSliderFile(); return false;" >Download Center</a>
							<li><a href="<?=$this->Html->url('/')?>annuaires/admin" >Directory VIP</a>	</li>
							<li><a href="<?=$this->Html->url('/aides/view')?>" >Help</a>	</li>
							<li><a href="<?=$this->Html->url('/statuts/view')?>" >Status</a>	</li> 
							<li><a href="<?=$this->Html->url('/mises/view')?>" >Updates</a>	</li>	</li>
							<li><a href="<?=$this->Html->url('/users/logout')?>" >Logout</a>	</li>
						</ul>
					</div>
			</li>

<?php }else{ ?>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/users/accueil')?>" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/house_go.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Tableau de bord</font>
				</a> 
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
				<?php echo $this->Html->image('icons/box.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Articles/Stock</font>
				</a>	
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/materiels/materiel')?>" class="widthcent5"><font class="widthcent3">Matériels</font></a>	</li>
							<li><a href="<?=$this->Html->url('/materiels/fourniture')?>" class="widthcent5"><font class="widthcent3">Fournitures</font></a>	</li>
							<li><a href="<?=$this->Html->url('/materiels/produit')?>" class="widthcent5"><font class="widthcent3">Produits</font></a>	</li>
							<li><a href="<?=$this->Html->url('/materiels/tout')?>" class="widthcent5"><font class="widthcent3">Tous les articles</font></a>	</li>
							<li><a href="<?=$this->Html->url('/materiels/pieces')?>" class="widthcent5"><font class="widthcent3">Magasins/Dépôts</font></a> </li>
							<li><a href="<?=$this->Html->url('/maintenances/admin')?>" class="widthcent5"><font class="widthcent3">Maintenances</font></a> </li>
						</ul>
					</div>	
			</li>
			
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
				<?php echo $this->Html->image('icons/box.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Inventaire</font>
				</a>	
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/inventaires/admin')?>" class="widthcent5"><font class="widthcent3">Les biens</font></a>	</li>
							<li><a href="<?=$this->Html->url('/stockcategories/inventaire')?>" class="widthcent5"><font class="widthcent3">Désignations</font></a>	</li>
							<li><a href="<?=$this->Html->url('/stockcategories/familles')?>" class="widthcent5"><font class="widthcent3">Familles</font></a>	</li>
						</ul>
					</div>
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
				<?php echo $this->Html->image('icons/calculator.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Journal</font>
				</a>	
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/stockactions/entree')?>" class="widthcent5"><font class="widthcent3">Entrées</font></a>	</li>
							<li><a href="<?=$this->Html->url('/stockactions/sortie')?>" class="widthcent5"><font class="widthcent3">Sorties</font></a>	</li>
							<li><a href="<?=$this->Html->url('/stockactions/journale')?>" class="widthcent5"><font class="widthcent3">Tous les opérations</font></a>	</li>
						</ul>
					</div>	
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/factures/admin')?>" class="mega-link btn widthcent2">
				<?php echo $this->Html->image('icons/afficher.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">BL/Factures</font>
				</a>
			</li>
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
				<?php echo $this->Html->image('icons/user_suit.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">CRM et Contacts</font>
				</a>	
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/clients/fournisseurs')?>" class="widthcent5"><font class="widthcent3">Fournisseurs</font></a></li>
							<li><a href="<?=$this->Html->url('/clients/clients')?>" class="widthcent5"><font class="widthcent3">Recepteurs</font></a></li>
							<!--<li><a href="<?=$this->Html->url('/clients/societem')?>" class="widthcent5"><font class="widthcent3">S. Maintenance</font></a></li>
							<li><a href="<?=$this->Html->url('/clients/societea')?>" class="widthcent5"><font class="widthcent3">S. Assurance</font></a>	</li>
							<li><a href="<?=$this->Html->url('/clients/fabricants')?>" class="widthcent5"><font class="widthcent3">Fabricants</font></a>	</li>
							<li><a href="<?=$this->Html->url('/contrats/tout')?>" class="widthcent5"><font class="widthcent3">Contrats</font></a>	</li>-->
							<li><a href="<?=$this->Html->url('/agendas/tout')?>" class="widthcent5"><font class="widthcent3">Agenda</font></a>	</li>
						</ul>
					</div>	
			</li>
			
			
<?php if($this->Session->read('Auth.User.role')=='admin'){?>	
	<li class="mega mega-current widthcent4">				
			<a href="<?=$this->Html->url('/users/tous')?>" class="mega-link btn widthcent2">
			<?php echo $this->Html->image('icons/status_offline.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Utilisateurs</font>
			</a>
	</li>
 <?php } ?>
			<!--<li class="mega mega-current widthcent4">				
				<a href="<?=$this->Html->url('/')?>alertes" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/bell.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Alertes</font>
				</a> 
			</li>-->
			
			<li class="mega mega-current widthcent4">				
				<a href="#" class="mega-link btn widthcent2">
					<?php echo $this->Html->image('icons/add.png', array('alt' => '','title'=>'votrecodeur.com icons'));?><font class="widthcent3">Plus</font>
				</a> 
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?=$this->Html->url('/')?>configurations" class="widthcent5"><font class="widthcent3">Configuration</font></a>	</li>
							<!--<li><a href="<?=$this->Html->url('/')?>statistiques" class="widthcent5"><font class="widthcent3">Statistiques</font></a>	</li>
							<li><a href="<?=$this->Html->url('/')?>alertes" class="widthcent5"><font class="widthcent3">Alertes</font></a>	</li>-->
							<li><a href="<?=$this->Html->url('/')?>evennements" class="widthcent5"><font class="widthcent3">Evennements</font></a>	</li>
							<li><a href="#" onclick="openFileBrowserSliderFile(); return false;" class="widthcent5"><font class="widthcent3">Centre de téléchargements</font></a>	</li>
							<!--<li><a href="<?=$this->Html->url('/')?>annuaires/admin" >Annuaire VIP</a>	</li>
							<li><a href="<?=$this->Html->url('/aides/view')?>" >Aide</a>	</li>
							<li><a href="<?=$this->Html->url('/statuts/view')?>" >Statut</a>	</li> 
							<li><a href="<?=$this->Html->url('/mises/view')?>" >Mises à jour</a>	</li>
							<li><a href="<?=$this->Html->url('/users/logout')?>" >Déconnecter</a>	</li>-->
						</ul>
					</div>
			</li>

<?php } ?>
