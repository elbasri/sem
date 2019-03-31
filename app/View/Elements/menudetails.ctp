<?php if($this->Session->read('lang')=='ar'){ ?>
		<ul class="mega-container mega-grey" style="box-shadow: 2px 2px 2px 2px #000;">
		<?php if($type=="employes"){ ?><li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/employes/admin')?>" style="color:black" >المستخدمين</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/specialites/admin')?>" style="color:black" ><font color="black">التخصصات</font></a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/taches/admin')?>" style="color:black" >المهام</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/primes/admin')?>" style="color:black" >المكافات</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/vacances/admin')?>" style="color:black" >الإجازات</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/paies/admin')?>" style="color:black" >جدول الرواتب</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/employes/noter')?>" style="color:black" >ملاحظات</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="stock"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/admin')?>" style="color:black" >البضائع</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockactions/journale')?>" style="color:black" >جدول العمليات</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/pieces')?>" style="color:black" >مخازن</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/imputationsheader')?>" style="color:black" >رسومات</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/marquesheader')?>" style="color:black" >علامات تجارية</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/famillesheader')?>" style="color:black" >فصائل</a> </li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/maintenances/admin')?>" style="color:black" >صيانات</a></li> <br><div style="clear:both;"></div>
		<?php }else if($type=="inventaire"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/tous')?>" style="color:black" >الممتلكات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/pieces')?>" style="color:black" >أمكنة</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/marquesheader')?>" style="color:black" >علامات تجارية</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/famillesheader')?>" style="color:black" >فصائل</a> </li> <br><div style="clear:both;"></div>
		<?php }else if($type=="crm"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/clients')?>" style="color:black" >العملاء</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/fournisseurs')?>" style="color:black" >الموردين</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/societem')?>" style="color:black" >شركات الصيانة</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/societea')?>" style="color:black" >شركات التأمين</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/societel')?>" style="color:black" >تأجير الشركات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/fabricants')?>" style="color:black" >المصنعين</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/projets')?>" style="color:black" >مشاريع العملاء</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/contrats/admin')?>" style="color:black" >العقود</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="projets"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/projets/admin')?>" style="color:black" >المشاريع</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/realisations/admin')?>" style="color:black" >الإنجازات</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/projets/lier')?>" style="color:black" >عميل => مشروع</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="compta"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/devises/admin')?>" style="color:red" >مبيعات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/devises/admin')?>" style="color:black" >مقايسات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/factureventes')?>" style="color:black" >فواتير</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/Commandes/ae')?>" style="color:black" >طلبات</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/bonventes')?>" style="color:black" >تسليمات</a>	</li> <br><div style="clear:both;"></div>
			<br><br>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="#" style="color:red" >المشتريات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/factureachats')?>" style="color:black" >فواتير</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/Commandes/ar')?>" style="color:black" >طلبات</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/bonachats')?>" style="color:black" >توصيلات</a>	</li> <br><div style="clear:both;"></div>
			<!--<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/recus/admin')?>" style="color:black" >Reçus</a>	</li><br>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/etiquettes/admin')?>" style="color:black" >Étiquettes</a>	</li><br>-->
		<?php }else if($type=="users"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/tous')?>" style="color:black" >جميع المستخدمين</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/admins')?>" style="color:black" >المدراء</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/employes')?>" style="color:black" >المشرفون</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/clients')?>" style="color:black" >العملاء</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="pages"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/tous')?>" style="color:black" >التدوينات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/br')?>" style="color:black" >المسودات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/pb')?>" style="color:black" >المنشورات</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="produits"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/tous')?>" style="color:black" >المنتوجات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/br')?>" style="color:black" >المسودات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/pb')?>" style="color:black" >المنشورات</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="services"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/tous')?>" style="color:black" >الخدمات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/br')?>" style="color:black" >المسودات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/pb')?>" style="color:black" >المنشورات</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="demandes"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/tous')?>" style="color:black" >الطلبات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/lu')?>" style="color:black" >المقروءة</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/nonlu')?>" style="color:black" >الغير مقروءة</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="pagesweb"){ ?>
			<!--<h3>D'autres pages</h3>-->
			<!--<li class="mega mega-current widthcent4" style="width:80%">
			<a href="#" class="mega-link btn widthcent2"><font class="widthcent3">Nouveautés:</font></a>
			</li>-->
			<?php foreach($consultationfooter as $post): 
						$titretext=$post['Consultation']['titrear'];
					$id=$post['Consultation']['id'];
					$titre=Inflector::slug($post['Consultation']['titre'],$replacement ='_');
					?>
				<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/pages/consultation/').$id.'/'.$titre?>" style="color:black"><?php echo $titretext;?></a>	</li> <br><div style="clear:both;"></div>
			<?php endforeach;?>
			<?php unset($liens);?>
			<li class="mega mega-current widthcent4" style="width:80%">
			<a href="<?=$this->Html->url('/consultations/archive')?>" class="mega-link btn widthcent2"><font class="widthcent3">زيارة الأرشيف</font></a>
			</li>
		<?php }else if($type=="comptat"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/depenses/admin')?>" style="color:black" >مصاريف</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/recettes/admin')?>" style="color:black" >إيرادات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/saisirs/admin')?>" style="color:black" >إدخال خصم/إئتمان</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/kilometrages/admin')?>" style="color:black" >مسافات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/deplacements/admin')?>" style="color:black" >تنقلات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockcategories/depenses')?>" style="color:black" >فئات المصاريف</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockcategories/recettes')?>" style="color:black" >فئات الإيرادات</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/comptes/admin')?>" style="color:black" >حسابات بنكية</a>	</li> <br><div style="clear:both;"></div>

		<?php } ?>
		
	</ul>			
<?php } else if($this->Session->read('lang')=='en'){ ?>
		<ul class="mega-container mega-grey" style="box-shadow: 2px 2px 2px 2px #000;">
		<?php if($type=="employes"){ ?><li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/employes/admin')?>" style="color:black" >Employees</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/specialites/admin')?>" style="color:black" ><font color="black">Specialties</font></a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/taches/admin')?>" style="color:black" >Tasks</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/primes/admin')?>" style="color:black" >Rewards</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/vacances/admin')?>" style="color:black" >Holidays</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/paies/admin')?>" style="color:black" >Payroll</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/employes/noter')?>" style="color:black" >Notes</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="stock"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/admin')?>" style="color:black" >Goods</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockactions/journale')?>" style="color:black" >Journal</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/pieces')?>" style="color:black" >Stores</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/imputationsheader')?>" style="color:black" >Charges</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/marquesheader')?>" style="color:black" >Brands</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/famillesheader')?>" style="color:black" >Families</a> </li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/maintenances/admin')?>" style="color:black" >Maintenances</a></li> <br><div style="clear:both;"></div>
		<?php }else if($type=="inventaire"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/tous')?>" style="color:black" >Goods</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/pieces')?>" style="color:black" >Locations</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/marquesheader')?>" style="color:black" >Brands</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/famillesheader')?>" style="color:black" >Families</a> </li> <br><div style="clear:both;"></div>
		<?php }else if($type=="crm"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/clients')?>" style="color:black" >Customers</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/fournisseurs')?>" style="color:black" >Suppliers</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/societem')?>" style="color:black" >Maintenance companies</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/societea')?>" style="color:black" >Insurance Companies</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/societel')?>" style="color:black" >Hire Companies</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/fabricants')?>" style="color:black" >Manufacturers</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/projets')?>" style="color:black" >Customers projects</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/contrats/admin')?>" style="color:black" >Contrats</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="projets"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/projets/admin')?>" style="color:black" >Projects</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/realisations/admin')?>" style="color:black" >Achievements</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/projets/lier')?>" style="color:black" >Project => Customer</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="compta"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="#" style="color:red" >Sales</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/devises/admin')?>" style="color:black" >Quotation</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/factureventes')?>" style="color:black" >Invoices</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/Commandes/ae')?>" style="color:black" >Commands</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/bonventes')?>" style="color:black" >Delivery</a>	</li> <br><div style="clear:both;"></div>
			<br><br>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="#" style="color:red" >Purchases</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/factureachats')?>" style="color:black" >Invoice</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/Commandes/ar')?>" style="color:black" >Commands</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/bonachats')?>" style="color:black" >Delivery</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="users"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/tous')?>" style="color:black" >All users</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/admins')?>" style="color:black" >Administrators</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/employes')?>" style="color:black" >Moderators</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/clients')?>" style="color:black" >Customers</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="pages"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/tous')?>" style="color:black" >ALL pages</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/br')?>" style="color:black" >Drafts</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/pb')?>" style="color:black" >Published</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="produits"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/tous')?>" style="color:black" >All products</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/br')?>" style="color:black" >Drafts</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/pb')?>" style="color:black" >Published</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="services"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/tous')?>" style="color:black" >All services</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/br')?>" style="color:black" >Drafts</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/pb')?>" style="color:black" >Published</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="demandes"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/tous')?>" style="color:black" >All requests</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/lu')?>" style="color:black" >Read</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/nonlu')?>" style="color:black" >Unread</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="pagesweb"){ ?>
			<!--<h3>D'autres pages</h3>-->
			<!--<li class="mega mega-current widthcent4" style="width:80%">
			<a href="#" class="mega-link btn widthcent2"><font class="widthcent3">Nouveautés:</font></a>
			</li>-->
			<?php foreach($consultationfooter as $post): 
					$id=$post['Consultation']['id'];
					$titre=Inflector::slug($post['Consultation']['titre'],$replacement ='_');
					?>
				<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/pages/consultation/').$id.'/'.$titre?>" style="color:black"><?php echo $post['Consultation']['titreen'];?></a>	</li> <br><div style="clear:both;"></div>
			<?php endforeach;?>
			<?php unset($liens);?>
			<li class="mega mega-current widthcent4" style="width:80%">
			<a href="<?=$this->Html->url('/consultations/archive')?>" class="mega-link btn widthcent2"><font class="widthcent3">Visit the archive</font></a>
			</li>
		<?php }else if($type=="comptat"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/depenses/admin')?>" style="color:black" >Spending</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/recettes/admin')?>" style="color:black" >Receipts</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/saisirs/admin')?>" style="color:black" >Entering Debit/Credit</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/kilometrages/admin')?>" style="color:black" >Mileage</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/deplacements/admin')?>" style="color:black" >Travel Allowances</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockcategories/depenses')?>" style="color:black" >Cat. Spending</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockcategories/recettes')?>" style="color:black" >Cat. Receipts</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/comptes/admin')?>" style="color:black" >Bank Accounts</a>	</li> <br><div style="clear:both;"></div>

		<?php } ?>
		
	</ul>			
<?php }else{ ?>
	<ul class="mega-container mega-grey" style="box-shadow: 2px 2px 2px 2px #000;">
		<?php if($type=="employes"){ ?><li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/employes/admin')?>" style="color:black" >Employés</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/specialites/admin')?>" style="color:black" ><font color="black">Spécialités</font></a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/taches/admin')?>" style="color:black" >Tâches</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/primes/admin')?>" style="color:black" >Primes</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/vacances/admin')?>" style="color:black" >Congés</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/paies/admin')?>" style="color:black" >Paie</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/employes/noter')?>" style="color:black" >Notes</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="stock"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/admin')?>" style="color:black" >Articles</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockactions/journale')?>" style="color:black" >Journale</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/pieces')?>" style="color:black" >Magasins</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/imputationsheader')?>" style="color:black" >Imputations</a></li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/marquesheader')?>" style="color:black" >Marques</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/materiels/famillesheader')?>" style="color:black" >Familles</a> </li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/maintenances/admin')?>" style="color:black" >Maintenances</a></li> <br><div style="clear:both;"></div>
		<?php }else if($type=="inventaire"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/tous')?>" style="color:black" >Tous les biens</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/pieces')?>" style="color:black" >Localisations</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/marquesheader')?>" style="color:black" >Marques</a></li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/inventaires/famillesheader')?>" style="color:black" >Familles</a> </li> <br><div style="clear:both;"></div>
		<?php }else if($type=="crm"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/contacts')?>" style="color:black" >Contacts</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/agendas/tout')?>" style="color:black" >Agenda</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/contrats/tout')?>" style="color:black" >Contrats</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/clients/projets')?>" style="color:black" >Projets des clients</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="projets"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/projets/admin')?>" style="color:black" >Projets</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/realisations/admin')?>" style="color:black" >Réalisations</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/projets/lier')?>" style="color:black" >Projet => clients</a>	</li> <br><div style="clear:both;"></div>
		<?php }else if($type=="compta"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="#" style="color:red" >Ventes</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/devises/admin')?>" style="color:black" >Devis</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/factureventes')?>" style="color:black" >Factures</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/Commandes/ae')?>" style="color:black" >Commandes</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/bonventes')?>" style="color:black" >Bon de livraison</a>	</li> <br><div style="clear:both;"></div>
			<br><br>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="#" style="color:red" >Achats</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/factureachats')?>" style="color:black" >Factures</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/Commandes/ar')?>" style="color:black" >Commandes</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/factures/bonachats')?>" style="color:black" >Bon de réception</a>	</li> <br><div style="clear:both;"></div>
			
			<!--<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/recus/admin')?>" style="color:black" >Reçus</a>	</li><br>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/etiquettes/admin')?>" style="color:black" >Étiquettes</a>	</li><br>-->
		<?php }else if($type=="users"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/tous')?>" style="color:black" >Tous</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/admins')?>" style="color:black" >Administrateurs</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/employes')?>" style="color:black" >Modérateurs</a>	</li><br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/users/clients')?>" style="color:black" >Clients</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="pages"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/tous')?>" style="color:black" >Tous</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/br')?>" style="color:black" >Brouillons</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/consultations/pb')?>" style="color:black" >Publiés</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="produits"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/tous')?>" style="color:black" >Tous</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/br')?>" style="color:black" >Brouillons</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/produits/pb')?>" style="color:black" >Publiés</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="services"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/tous')?>" style="color:black" >Tous</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/br')?>" style="color:black" >Brouillons</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/services/pb')?>" style="color:black" >Publiés</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="demandes"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/tous')?>" style="color:black" >Tous</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/lu')?>" style="color:black" >Lu</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/demandes/nonlu')?>" style="color:black" >Non Lu</a>	</li><br><div style="clear:both;"></div>

		<?php }else if($type=="pagesweb"){ ?>
			<!--<h3>D'autres pages</h3>-->
			<!--<li class="mega mega-current widthcent4" style="width:80%">
			<a href="#" class="mega-link btn widthcent2"><font class="widthcent3">Nouveautés:</font></a>
			</li>-->
			<?php foreach($consultationfooter as $post): 
					$id=$post['Consultation']['id'];
					$titre=Inflector::slug($post['Consultation']['titre'],$replacement ='_');
					?>
				<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/pages/consultation/').$id.'/'.$titre?>" style="color:black"><?php echo $post['Consultation']['titre'];?></a>	</li> <br><div style="clear:both;"></div>
			<?php endforeach;?>
			<?php unset($liens);?>
			<li class="mega mega-current widthcent4" style="width:80%">
			<a href="<?=$this->Html->url('/consultations/archive')?>" class="mega-link btn widthcent2"><font class="widthcent3">Visitez L'archive</font></a>
			</li>
		<?php }else if($type=="comptat"){ ?>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/depenses/admin')?>" style="color:black" >Dépenses</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/recettes/admin')?>" style="color:black" >Recettes</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/saisirs/admin')?>" style="color:black" >Saisie Débit/Crédit</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/kilometrages/admin')?>" style="color:black" >Kilométrage</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/deplacements/admin')?>" style="color:black" >Indemnités de déplacement</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockcategories/depenses')?>" style="color:black" >Cat. dépenses</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/stockcategories/recettes')?>" style="color:black" >Cat. recettes</a>	</li> <br><div style="clear:both;"></div>
			<li style="background:#fff;text-align:center;padding: 5px 5px 5px 5px" ><a href="<?=$this->Html->url('/comptes/admin')?>" style="color:black" >Comptes bancaires</a>	</li> <br><div style="clear:both;"></div>

		<?php } ?>
		
	</ul>	
<?php } ?>			
	