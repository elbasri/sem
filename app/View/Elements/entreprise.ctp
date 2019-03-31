<?php 
if($this->Session->read('lang')=='ar'){ ?>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/user_suit.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>علاقات و عملاء
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/clients/clients')?>" >العملاء</a>	</li>
						<li><a href="<?=$this->Html->url('/clients/fournisseurs')?>" >الموردين</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/societem')?>" >شركات الصيانة</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/societea')?>" >شركات التأمين</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/societel')?>" >تأجير الشركات</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/fabricants')?>" >المصنعين</a>	</li>
						<li><a href="<?=$this->Html->url('/clients/projets')?>" >مشاريع العملاء</a></li> 
						<li><a href="<?=$this->Html->url('/contrats/admin')?>" >العقود</a>	</li>
					</ul>
				</div>	
</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/box.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>الجرد/الممتلكات
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						 
						<li><a href="<?=$this->Html->url('/inventaires/admin')?>" >الممتلكات</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/pieces')?>" >أمكنة</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/marquesheader')?>" >علامات تجارية</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/famillesheader')?>" >فصائل</a>	</li>
					</ul>
				</div>	
</li>
	<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/building.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>إدارة المخزون
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/materiels/admin')?>" >البضائع</a>	</li>
						<li><a href="<?=$this->Html->url('/stockactions/journale')?>" >جدول العمليات</a>	</li>
						<li><a href="<?=$this->Html->url('/materiels/pieces')?>" >مخازن</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/imputationsheader')?>" >رسومات</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/marquesheader')?>" >علامات تجارية</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/famillesheader')?>" >فصائل</a>	</li>
						<li><a href="<?=$this->Html->url('/maintenances/admin')?>" >صيانات</a>	</li> 
					</ul>
				</div>	
	</li>
<li class="mega mega-current" >				
			<a href="#" class="mega-link btn"> <?php echo $this->Html->image('icons/user_gray.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>الموارد البشرية</a>
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/employes/admin')?>" >المستخدمين</a>	</li>
						<li><a href="<?=$this->Html->url('/taches/admin')?>" >المهام</a>	</li>
						<li><a href="<?=$this->Html->url('/specialites/admin')?>" >التخصصات</a>	</li> 
						<li><a href="<?=$this->Html->url('/vacances/admin')?>" >الإجازات</a>	</li> 
						<li><a href="<?=$this->Html->url('/primes/admin')?>" >المكافات</a>	</li>
						<li><a href="<?=$this->Html->url('/paies/admin')?>" >جدول الرواتب</a>	</li>
						<li><a href="<?=$this->Html->url('/employes/noter')?>" >ملاحظات</a>	</li> 
					</ul>
				</div>			
	</li>
<?php }
else if($this->Session->read('lang')=='en'){ ?>
	<li class="mega mega-current" >				
			<a href="#" class="mega-link btn"> <?php echo $this->Html->image('icons/user_gray.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Human resources</a>
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/employes/admin')?>" >Employees</a>	</li>
						<li><a href="<?=$this->Html->url('/taches/admin')?>" >Tasks</a>	</li>
						<li><a href="<?=$this->Html->url('/specialites/admin')?>" >Specialties</a>	</li> 
						<li><a href="<?=$this->Html->url('/vacances/admin')?>" >Holidays</a>	</li> 
						<li><a href="<?=$this->Html->url('/primes/admin')?>" >Rewards</a>	</li>
						<li><a href="<?=$this->Html->url('/paies/admin')?>" >Payroll</a>	</li>
						<li><a href="<?=$this->Html->url('/employes/noter')?>" >Notes</a>	</li> 
					</ul>
				</div>			
	</li>
	<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/building.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Stock management
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/materiels/admin')?>" >Goods</a>	</li>
						<li><a href="<?=$this->Html->url('/stockactions/journale')?>" >Journal</a>	</li>
						<li><a href="<?=$this->Html->url('/materiels/pieces')?>" >Stores</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/imputationsheader')?>" >Charges</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/marquesheader')?>" >Brands</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/famillesheader')?>" >Families</a>	</li>
						<li><a href="<?=$this->Html->url('/maintenances/admin')?>" >Maintenances</a>	</li> 
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/box.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Inventory
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						 
						<li><a href="<?=$this->Html->url('/inventaires/admin')?>" >Goods</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/pieces')?>" >Locations</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/marquesheader')?>" >Brands</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/famillesheader')?>" >Families</a>	</li>
					</ul>
				</div>	
</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/user_suit.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>CRM and Contacts
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/clients/clients')?>" >Customers</a>	</li>
						<li><a href="<?=$this->Html->url('/clients/fournisseurs')?>" >Suppliers</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/societem')?>" >Maintenance companies</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/societea')?>" >Insurance Companies</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/societel')?>" >Hire Companies</a>	</li> 
						<li><a href="<?=$this->Html->url('/clients/fabricants')?>" >Manufacturers</a>	</li>
						<li><a href="<?=$this->Html->url('/clients/projets')?>" >Customers projects</a></li> 
						<li><a href="<?=$this->Html->url('/contrats/admin')?>" >Contrats</a>	</li>
					</ul>
				</div>	
</li>
<?php }
else{ ?>
	<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/building.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Gestion du Stock
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/materiels/admin')?>" >Articles</a>	</li>
						<li><a href="<?=$this->Html->url('/stockactions/journale')?>" >Journale</a>	</li>
						<li><a href="<?=$this->Html->url('/materiels/pieces')?>" >Magasins</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/imputationsheader')?>" >Imputations</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/marquesheader')?>" >Marques</a>	</li> 
						<li><a href="<?=$this->Html->url('/materiels/famillesheader')?>" >Familles</a>	</li>
						<li><a href="<?=$this->Html->url('/maintenances/admin')?>" >Maintenances</a>	</li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/user_suit.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>CRM et Contacts
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/clients/contacts')?>" >Contacts</a></li> 
						<li><a href="<?=$this->Html->url('/agendas/tout')?>" >Agenda</a></li> 
						<li><a href="<?=$this->Html->url('/contrats/tout')?>" >Contrats</a>	</li>
						<li><a href="<?=$this->Html->url('/clients/projets')?>" >Projets des clients</a></li> 
					</ul>
				</div>	
	</li>
	<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/box.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Inventory
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						 
						<li><a href="<?=$this->Html->url('/inventaires/admin')?>" >Goods</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/pieces')?>" >Locations</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/marquesheader')?>" >Brands</a>	</li>
						<li><a href="<?=$this->Html->url('/inventaires/famillesheader')?>" >Families</a>	</li>
					</ul>
				</div>	
</li>
<?php }
?>
	