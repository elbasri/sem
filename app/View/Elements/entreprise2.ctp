<?php if($this->Session->read('lang')=='ar'){ ?>
<li class="mega mega-current">				
			<a href="<?=$this->Html->url('/impressions')?>" class="mega-link btn">
			<?php echo $this->Html->image('icons/printer.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>تقارير
			</a>
	</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/calculator.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>المحاسبة
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/depenses/admin')?>" >مصاريف</a>	</li> 
						<li><a href="<?=$this->Html->url('/recettes/admin')?>" >إيرادات</a>	</li>
						<li><a href="<?=$this->Html->url('/saisirs/admin')?>" >إدخال خصم/إئتمان</a>	</li>
						<li><a href="<?=$this->Html->url('/kilometrages/admin')?>" >مسافات</a>	</li>
						<li><a href="<?=$this->Html->url('/deplacements/admin')?>" >تنقلات</a>	</li>
						<li><a href="<?=$this->Html->url('/comptes/admin')?>" >حسابات بنكية</a>	</li> 
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/basket.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>إدارة الأعمال
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="#" style="color:red">مبيعات</a>	</li> 
						<li><a href="<?=$this->Html->url('/devises/admin')?>" >إقتباسات</a>	</li> 
						<li><a href="<?=$this->Html->url('/factures/factureventes')?>" >فواتير</a>	</li>
						<li><a href="<?=$this->Html->url('/commandes/ae')?>" >طلبات</a>	</li>  
						<li><a href="<?=$this->Html->url('/factures/bonventes')?>" >تسليمات</a>	</li>
						<li><a href="#" style="color:red">مشتريات</a>	</li> 
						<li><a href="<?=$this->Html->url('/factures/factureachats')?>" >فواتير</a>	</li>
						<li><a href="<?=$this->Html->url('/commandes/ar')?>" >طلبات</a>	</li>  
						<li><a href="<?=$this->Html->url('/factures/bonachats')?>" >توصيلات</a>	</li>
						
						<!--<li><a href="<?=$this->Html->url('/recus/admin')?>" >Reçus</a>	</li>
						<li><a href="<?=$this->Html->url('/etiquette/admin')?>" >Étiquettes</a>	</li>-->
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/folder.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>إدارة المشاريع
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/projets/admin')?>" >المشاريع</a>	</li>
						<li><a href="<?=$this->Html->url('/realisations/admin')?>" >الإنجازات</a>	</li>
						<li><a href="<?=$this->Html->url('/projets/lier')?>" >عميل => مشروع</a>	</li> 
					</ul>
				</div>	
	</li>

<?php } else if($this->Session->read('lang')=='en'){ ?>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/folder.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Project management
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/projets/admin')?>" >Projects</a>	</li>
						<li><a href="<?=$this->Html->url('/realisations/admin')?>" >Achievements</a>	</li>
						<li><a href="<?=$this->Html->url('/projets/lier')?>" >Project => Customer</a>	</li> 
					</ul>
				</div>	
	</li>

<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/basket.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Business Management
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="#" style="color:red">Sales</a>	</li> 
						<li><a href="<?=$this->Html->url('/devises/admin')?>" >Quotation</a>	</li> 
						<li><a href="<?=$this->Html->url('/factures/factureventes')?>" >Invoices</a>	</li>
						<li><a href="<?=$this->Html->url('/commandes/ae')?>" >Commands</a>	</li>  
						<li><a href="<?=$this->Html->url('/factures/bonventes')?>" >Delivery</a>	</li>
						<li><a href="#" style="color:red">Purchases</a>	</li> 
						<li><a href="<?=$this->Html->url('/factures/factureachats')?>" >Bills</a>	</li>
						<li><a href="<?=$this->Html->url('/commandes/ar')?>" >Commands</a>	</li>  
						<li><a href="<?=$this->Html->url('/factures/bonachats')?>" >Delivery</a>	</li>
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/calculator.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Accounting
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/depenses/admin')?>" >Spending</a>	</li> 
						<li><a href="<?=$this->Html->url('/recettes/admin')?>" >Receipts</a>	</li>
						<li><a href="<?=$this->Html->url('/saisirs/admin')?>" >Entering Debit/Credit</a>	</li>
						<li><a href="<?=$this->Html->url('/kilometrages/admin')?>" >Mileage</a>	</li>
						<li><a href="<?=$this->Html->url('/deplacements/admin')?>" >Travel Allowances</a>	</li>
						<li><a href="<?=$this->Html->url('/comptes/admin')?>" >Bank Accounts</a>	</li> 
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="<?=$this->Html->url('/impressions')?>" class="mega-link btn">
			<?php echo $this->Html->image('icons/printer.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Reporting
			</a>
	</li>
<?php }else{ ?>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/folder.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Gestion de projets
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/projets/admin')?>" >Projets</a>	</li>
						<li><a href="<?=$this->Html->url('/realisations/admin')?>" >Réalisations</a>	</li>
						<li><a href="<?=$this->Html->url('/projets/lier')?>" >Projet => clients</a>	</li> 
					</ul>
				</div>	
	</li>

<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/basket.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Gestion commerciale
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="#" style="color:red">Ventes</a>	</li> 
						<li><a href="<?=$this->Html->url('/devises/admin')?>" >Devis</a>	</li> 
						<li><a href="<?=$this->Html->url('/factures/factureventes')?>" >Factures</a>	</li>
						<li><a href="<?=$this->Html->url('/commandes/ae')?>" >Commandes</a>	</li>  
						<li><a href="<?=$this->Html->url('/factures/bonventes')?>" >Bon de livraison</a>	</li>
						<li><a href="#" style="color:red">Achats</a>	</li> 
						<li><a href="<?=$this->Html->url('/factures/factureachats')?>" >Factures</a>	</li>
						<li><a href="<?=$this->Html->url('/commandes/ar')?>" >Commandes</a>	</li>  
						<li><a href="<?=$this->Html->url('/factures/bonachats')?>" >Bon de réception</a>	</li>
						<!--<li><a href="<?=$this->Html->url('/recus/admin')?>" >Reçus</a>	</li>
						<li><a href="<?=$this->Html->url('/etiquette/admin')?>" >Étiquettes</a>	</li>-->
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="#" class="mega-link btn">
			<?php echo $this->Html->image('icons/calculator.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Comptabilité
			</a>	
				<div class="mega-content mega-menu ">
					<ul>
						<li><a href="<?=$this->Html->url('/depenses/admin')?>" >Dépenses</a>	</li> 
						<li><a href="<?=$this->Html->url('/recettes/admin')?>" >Recettes</a>	</li>
						<li><a href="<?=$this->Html->url('/saisirs/admin')?>" >Saisie Débit/Crédit</a>	</li>
						<li><a href="<?=$this->Html->url('/kilometrages/admin')?>" >Kilométrage</a>	</li>
						<li><a href="<?=$this->Html->url('/deplacements/admin')?>" >Indemnités de déplacement</a>	</li>
						<li><a href="<?=$this->Html->url('/comptes/admin')?>" >Comptes bancaires</a>	</li> 
					</ul>
				</div>	
	</li>
<li class="mega mega-current">				
			<a href="<?=$this->Html->url('/impressions')?>" class="mega-link btn">
			<?php echo $this->Html->image('icons/printer.png', array('alt' => '','title'=>'votrecodeur.com icons'));?>Rapports
			</a>
	</li>
<?php } ?>
