<?php if($this->Session->read('lang')=='ar'){ ?>
<div class="affichagear" >
<?php echo $this->Form->create('Configuration');?>
<h2 style="margin:10px 10px 10px 10px;" >إعدادات اللغة</h2>
<div class="infosdemande" >
			<table>	
				<tr>
					<td><?php echo $this->Form->input('lng',array('label'=>'اللغة الرسمية','options'=>array('fr'=>'الفرنسية','en'=>'الإنجليزية','ar'=>'العربية')));?>
					</td>
				</tr>
			</table>
			<table>	
				<tr>
					<td><?php echo $this->Form->input('fr',array('label'=>'اللغة الفرنسية','options'=>array('1'=>'تفعيل','0'=>'إيقاف')));?>
					</td>
					<td><?php echo $this->Form->input('en',array('label'=>'اللغة الإنجليزية','options'=>array('1'=>'تفعيل','0'=>'إيقاف')));?>
					</td>
					<td><?php echo $this->Form->input('ar',array('label'=>'اللغة العربية','options'=>array('1'=>'تفعيل','0'=>'إيقاف')));?>
					</td>
				</tr>
			</table>								
</div>
<h1 >إضغط على مكون بالإحمر لإظهاره/إخفاءه</h2>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confinfos');">المعلومات الإساسية للشركة</h2>
		<div class="infosdemande" id="confinfos" style="display:none">
			<table>	
				<tr>
					<td><br><br><br><h3>&nbsp;<a href="#" style="text-align:center"  onclick="openFileBrowserSliderPhoto(); return false;" >إختر واحدا</a></h3>
					</td>
					<td><?php echo $this->Form->input('logo',array('label'=>'شعار الشركة','id'=>'SliderPhoto'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('titre',array('label'=>'إسم الشركة بالفرنسية'));?>
					<?php echo $this->Form->input('titreen',array('label'=>'إسم الشركة بالإنجليزية'));?>
					<?php echo $this->Form->input('titrear',array('label'=>'إسم الشركة بالعربية'));?>
					</td>
					<td><?php echo $this->Form->input('desc',array('label'=>'الوصف بالفرنسية'));?>
					<?php echo $this->Form->input('descen',array('label'=>'الوصف بالإنجليزية'));?>
					<?php echo $this->Form->input('descar',array('label'=>'الوصف بالعربية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('tel',array('label'=>'رقم الهاتف'));?>
					</td>
					<td><?php echo $this->Form->input('tel2',array('label'=>'رقم الهاتف الثانوي'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('email',array('label'=>'البريد الإلكتروني الرسمي'));?>
					</td>
					<td><?php echo $this->Form->input('fax',array('label'=>'الفاكس'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('codep',array('label'=>'الرمز البريدي'));?>
					</td>
					<td><?php echo $this->Form->input('ville',array('label'=>'إسم المدينة بالفرنسية'));?>
					<?php echo $this->Form->input('villeen',array('label'=>'إسم المدينة بالإنجليزية'));?>
					<?php echo $this->Form->input('villear',array('label'=>'إسم المدينة بالعربية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('pays',array('label'=>'إسم الدولة بالفرنسية'));?>
					<?php echo $this->Form->input('paysen',array('label'=>'إسم الدولة بالإنجليزية'));?>
					<?php echo $this->Form->input('paysar',array('label'=>'إسم الدولة بالعربية'));?>
					</td>
					<td><?php echo $this->Form->input('adresse',array('label'=>'العنوان البريدي بالفرنسية'));?>
					<?php echo $this->Form->input('adresseen',array('label'=>'العنوان البريدي بالإنجليزية'));?>
					<?php echo $this->Form->input('adressear',array('label'=>'العنوان البريدي بالعربية'));?>
					</td>
				</tr>
			</table>
<?php echo $this->Form->input('contacttext',array('label'=>'النص المستعرض في صفحة الطلبات بالفرنسية'));?>
<?php echo $this->Form->input('contacttexten',array('label'=>'النص المستعرض في صفحة الطلبات بالإنجليزية'));?>
<?php echo $this->Form->input('contacttextar',array('label'=>'النص المستعرض في صفحة الطلبات بالعربية'));?>			
		</div>	
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confid');">المعرفات القانونية</h2>
		<div class="infosdemande"  id="confid" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('siret',array('label'=>'رقم نظام تحديد دليل المؤسسات'));?>
					</td>
					<td><?php echo $this->Form->input('siren',array('label'=>'رقم الوحدة القانونية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('ape',array('label'=>'رقم النشاط الرئيسي'));?>
					</td>
					<td><?php echo $this->Form->input('rcs',array('label'=>'الرقم التجاري'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confcalc');">إعدادات العد</h2>
		<div class="infosdemande"  id="confcalc" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('Devises',array('label'=>'العملة'));?>
					</td>
					<td><?php echo $this->Form->input('poids',array('label'=>'وحدة الوزن'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('volume',array('label'=>'وحدة الحجم'));?>
					</td>
					<td><?php echo $this->Form->input('distance',array('label'=>'وحدة المسافات'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('conffact');">إعدادات الفواتير</h2>
		<div class="infosdemande" id="conffact" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('cpaiement',array('label'=>'شروط الدفع','options'=>array('0 أيام'=>'0 أيام','7 أيام'=>'7 أيام','14 أيام'=>'14 أيام','30 أيام'=>'30 أيام','60 أيام'=>'60 أيام','90 أيام'=>'90 أيام','أكثر من 90 يوما'=>'أكثر من 90 يوما')));?>
					</td>
					<td><?php echo $this->Form->input('iretard',array('label'=>'الفوائد الافتراضية ب%'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('conftva');">إعدادات الضريبة</h2>
		<div class="infosdemande" id="conftva" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('dtva',array('label'=>'الحالة الضريبية','options'=>array('0'=>'لا تخضع لضريبة القيمة المضافة','شهريا'=>'شهريا','فصليا'=>'فصليا','سنويا'=>'سنويا')));?>
					</td>
					<td><?php echo $this->Form->input('tva',array('label'=>'الضريبة الإفتراضية'));?>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td><?php echo $this->Form->input('ntva',array('label'=>'الرقم الضريبي'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confaff');">إعدادات الموقع الإلكتروني</h2>
		<div class="infosdemande"  id="confaff" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('menu',array('label'=>'تفعيل القائمة الرئيسية؟','options'=>array('1'=>'نعم','0'=>'لا')));?>
					</td>
					<td><?php echo $this->Form->input('siteweb',array('label'=>'تنشيط الموقع الإلكتروني؟','options'=>array('1'=>'نعم','0'=>'لا')));?>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><?php echo $this->Form->input('qui',array('label'=>'إظهار صفحة من نحن؟','options'=>array('1'=>'نعم','0'=>'لا'))); echo $this->Form->input('quitext',array('label'=>'النص المستعرض بالفرنسية')); echo $this->Form->input('quitexten',array('label'=>'النص المستعرض بالإنجليزية')); echo $this->Form->input('quitextar',array('label'=>'النص المستعرض بالعربية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('pour',array('label'=>'إظهار صفحة لماذا نحن؟','options'=>array('1'=>'نعم','0'=>'لا'))); echo $this->Form->input('pourtext',array('label'=>'النص المستعرض بالفرنسية')); echo $this->Form->input('pourtexten',array('label'=>'النص المستعرض بالإنجليزية')); echo $this->Form->input('pourtextar',array('label'=>'النص المستعرض بالعربية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('produits',array('label'=>'إظهار المنتجات في القائمة؟','options'=>array('1'=>'نعم','0'=>'لا'))); echo $this->Form->input('produitstext',array('label'=>'النص المستعرض بالفرنسية')); echo $this->Form->input('produitstexten',array('label'=>'النص المستعرض بالإنجليزية')); echo $this->Form->input('produitstextar',array('label'=>'النص المستعرض بالعربية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('services',array('label'=>'إظهار الخدمات في القائمة؟','options'=>array('1'=>'نعم','0'=>'لا'))); echo $this->Form->input('servicestext',array('label'=>'النص المستعرض بالفرنسية')); echo $this->Form->input('servicestexten',array('label'=>'النص المستعرض بالإنجليزية')); echo $this->Form->input('servicestextar',array('label'=>'النص المستعرض بالعربية'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('nouveates',array('label'=>'إظهار التدوينات في القائمة؟','options'=>array('1'=>'نعم','0'=>'لا'))); echo $this->Form->input('nouveatestext',array('label'=>'النص المستعرض بالفرنسية')); echo $this->Form->input('nouveatestexten',array('label'=>'النص المستعرض بالإنجليزية')); echo $this->Form->input('nouveatestextar',array('label'=>'النص المستعرض بالعربية'));?>
					</td>
					<td>
					</td>
				</tr>
			</table>								
		</div>	
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confsoc');">الشبكات الإجتماعية</h2>
		<div class="infosdemande"  id="confsoc" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('twitter',array('label'=>'تويتر'));?>
					</td>
					<td><?php echo $this->Form->input('facebook',array('label'=>'فيسبوك'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('gplus',array('label'=>'جوجل بلاس'));?>
					</td>
					<td><?php echo $this->Form->input('youtube',array('label'=>'يوتيوب'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confsta');">إحصائيات الموقع الإلكتروني</h2>
		<div class="infosdemande"  id="confsta" style="display:none">
			<table>	
				<tr>
					<td><strong></strong>
					</td>
					<td style="width:50%"><?php echo $this->Form->input('analytics',array('label'=>'Tracking ID (تحليلات جوجل)'));?>
					</td>
				</tr>
			</table>								
		</div>
<?php 
echo $this->Form->input('id',array('type' => 'hidden'));
 echo $this->Form->end('تطبيق الإعدادات'); 
?>			
<?php } else if($this->Session->read('lang')=='en'){ ?>
<div class="affichage" >
<?php echo $this->Form->create('Configuration');?>
<h2 style="margin:10px 10px 10px 10px;" >Languages settings</h2>
<div class="infosdemande" >
			<table>	
				<tr>
					<td><?php echo $this->Form->input('lng',array('label'=>'Main language','options'=>array('fr'=>'Frensh','en'=>'English','ar'=>'Arabic')));?>
					</td>
				</tr>
			</table>
			<table>	
				<tr>
					<td><?php echo $this->Form->input('fr',array('label'=>'French language','options'=>array('1'=>'Active','0'=>'Inactive')));?>
					</td>
					<td><?php echo $this->Form->input('en',array('label'=>'English language','options'=>array('1'=>'Active','0'=>'Inactive')));?>
					</td>
					<td><?php echo $this->Form->input('ar',array('label'=>'Arabic language','options'=>array('1'=>'Active','0'=>'Inactive')));?>
					</td>
				</tr>
			</table>								
</div>
<h1>Click on a red element to show/hide</h2>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confinfos');">Company informations</h2>
		<div class="infosdemande" id="confinfos" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('logo',array('label'=>'Company logo','id'=>'SliderPhoto'));?>
					</td>
					<td><br><br><h3>&nbsp;<a href="#" style="text-align:center"  onclick="openFileBrowserSliderPhoto(); return false;" >Select</a></h3>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('titre',array('label'=>'Company Name in french'));?>
					<?php echo $this->Form->input('titreen',array('label'=>'Company Name in english'));?>
					<?php echo $this->Form->input('titrear',array('label'=>'Company Name in arabic'));?>
					</td>
					<td><?php echo $this->Form->input('desc',array('label'=>'Website Description in frensh'));?>
					<?php echo $this->Form->input('descen',array('label'=>'Website Description in anglish'));?>
					<?php echo $this->Form->input('descar',array('label'=>'Website Description in arabic'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('tel',array('label'=>'Phone'));?>
					</td>
					<td><?php echo $this->Form->input('tel2',array('label'=>'Secondary phone'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('email',array('label'=>'Official email'));?>
					</td>
					<td><?php echo $this->Form->input('fax',array('label'=>'Fax'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('codep',array('label'=>'Postcode'));?>
					</td>
					<td><?php echo $this->Form->input('ville',array('label'=>'City in french'));?>
					<?php echo $this->Form->input('villeen',array('label'=>'City in english'));?>
					<?php echo $this->Form->input('villear',array('label'=>'City in arabic'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('pays',array('label'=>'Country in frensh'));?>
					<?php echo $this->Form->input('paysen',array('label'=>'Country in english'));?>
					<?php echo $this->Form->input('paysar',array('label'=>'Country in arabic'));?>
					</td>
					<td><?php echo $this->Form->input('adresse',array('label'=>'Postal Address in french'));?>
					<?php echo $this->Form->input('adresseen',array('label'=>'Postal Address in english'));?>
					<?php echo $this->Form->input('adressear',array('label'=>'Postal Address in arabic'));?>
					</td>
				</tr>
			</table>
<?php echo $this->Form->input('contacttext',array('label'=>'Text of Request page in french'));?>
<?php echo $this->Form->input('contacttexten',array('label'=>'Text of Request page in english'));?>
<?php echo $this->Form->input('contacttextar',array('label'=>'Text of Request page in arabic'));?>			
		</div>	
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confid');">Identifications</h2>
		<div class="infosdemande"  id="confid" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('siret',array('label'=>'SIRET'));?>
					</td>
					<td><?php echo $this->Form->input('siren',array('label'=>'SIREN'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('ape',array('label'=>'APE'));?>
					</td>
					<td><?php echo $this->Form->input('rcs',array('label'=>'RCS'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confcalc');">Calculations settings</h2>
		<div class="infosdemande"  id="confcalc" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('Devises',array('label'=>'Currency'));?>
					</td>
					<td><?php echo $this->Form->input('poids',array('label'=>'Weight unit'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('volume',array('label'=>'Volume unit'));?>
					</td>
					<td><?php echo $this->Form->input('distance',array('label'=>'Distances unit'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('conffact');">Billing settings</h2>
		<div class="infosdemande" id="conffact" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('cpaiement',array('label'=>'Payment Terms','options'=>array('0 days'=>'0 days','7 days'=>'7 days','14 days'=>'14 days','30 days'=>'30 days','60 days'=>'60 days','90 days'=>'90 days','Over 90 days'=>'Over 90 days')));?>
					</td>
					<td><?php echo $this->Form->input('iretard',array('label'=>'Default interest in %'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('conftva');">VAT settings</h2>
		<div class="infosdemande" id="conftva" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('dtva',array('label'=>'VAT return','options'=>array('0'=>'Not subject to VAT','Monthly'=>'Monthly','Quarterly'=>'Quarterly','Annually'=>'Annually')));?>
					</td>
					<td><?php echo $this->Form->input('tva',array('label'=>'VAT default'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('ntva',array('label'=>'N° VAT'));?>
					</td>
					<td>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confaff');">Display settings (website)</h2>
		<div class="infosdemande"  id="confaff" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('siteweb',array('label'=>'Enable website ?','options'=>array('1'=>'Yes','0'=>'No')));?>
					</td>
					<td><?php echo $this->Form->input('menu',array('label'=>'Display the menu ?','options'=>array('1'=>'Yes','0'=>'No')));?>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><?php echo $this->Form->input('qui',array('label'=>'Show "About us" page?','options'=>array('1'=>'Yes','0'=>'No'))); echo $this->Form->input('quitext',array('label'=>'Text to display in french')); echo $this->Form->input('quitexten',array('label'=>'Text to display in english')); echo $this->Form->input('quitextar',array('label'=>'Text to display in arabic'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('pour',array('label'=>'Show "Why Us" page?','options'=>array('1'=>'Yes','0'=>'No'))); echo $this->Form->input('pourtext',array('label'=>'Text to display in frensh')); echo $this->Form->input('pourtexten',array('label'=>'Text to display in english')); echo $this->Form->input('pourtextar',array('label'=>'Text to display in arabic'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('produits',array('label'=>'Show Products in the menu ?','options'=>array('1'=>'Yes','0'=>'No'))); echo $this->Form->input('produitstext',array('label'=>'Text to display in frensh')); echo $this->Form->input('produitstexten',array('label'=>'Text to display in english')); echo $this->Form->input('produitstextar',array('label'=>'Text to display in arabic'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('services',array('label'=>'Show Services in the menu ?','options'=>array('1'=>'Yes','0'=>'No'))); echo $this->Form->input('servicestext',array('label'=>'Text to display in frensh')); echo $this->Form->input('servicestexten',array('label'=>'Text to display in engish')); echo $this->Form->input('servicestextar',array('label'=>'Text to display in arabic'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('nouveates',array('label'=>'Show news in the menu ?','options'=>array('1'=>'Yes','0'=>'No'))); echo $this->Form->input('nouveatestext',array('label'=>'Text to display in frensh')); echo $this->Form->input('nouveatestexten',array('label'=>'Text to display in english')); echo $this->Form->input('nouveatestextar',array('label'=>'Text to display in arabic'));?>
					</td>
				</tr>
			</table>								
		</div>	
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confsoc');">Social Networks</h2>
		<div class="infosdemande"  id="confsoc" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('twitter',array('label'=>'Twitter'));?>
					</td>
					<td><?php echo $this->Form->input('facebook',array('label'=>'Facebook'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('gplus',array('label'=>'Google Plus'));?>
					</td>
					<td><?php echo $this->Form->input('youtube',array('label'=>'Youtube'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confsta');">Website Statistics</h2>
		<div class="infosdemande"  id="confsta" style="display:none">
			<table>	
				<tr>
					<td style="width:50%"><?php echo $this->Form->input('analytics',array('label'=>'Tracking ID (google analytics)'));?>
					</td>
					<td><strong></strong>
					</td>
				</tr>
			</table>								
		</div>
<?php 
echo $this->Form->input('id',array('type' => 'hidden'));
 echo $this->Form->end('Apply Configurations'); 
?>			
<?php }else{ ?>
<div class="affichage" >
<?php echo $this->Form->create('Configuration');?>
<h2 style="margin:10px 10px 10px 10px;" >Paramètres de Langues</h2>
<div class="infosdemande" >
			<table>	
				<tr>
					<td><?php echo $this->Form->input('lng',array('label'=>'Langue principale','options'=>array('fr'=>'Frensh','en'=>'English','ar'=>'Arabic')));?>
					</td>
				</tr>
			</table>
			<table>	
				<tr>
					<td><?php echo $this->Form->input('fr',array('label'=>'Langue français','options'=>array('1'=>'Actif','0'=>'Inactif')));?>
					</td>
					<td><?php echo $this->Form->input('en',array('label'=>'Langue anglais','options'=>array('1'=>'Actif','0'=>'Inactif')));?>
					</td>
					<td><?php echo $this->Form->input('ar',array('label'=>'Langue arabe','options'=>array('1'=>'Actif','0'=>'Inactif')));?>
					</td>
				</tr>
			</table>								
</div>
<h1>Cliquer sur un élement en rouge pour afficher/cacher</h2>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confinfos');">Informations d'entreprise</h2>
		<div class="infosdemande" id="confinfos" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('logo',array('label'=>'Logo d\'entreprise','id'=>'SliderPhoto'));?>
					</td>
					<td><br><br><h3>&nbsp;<a href="#" style="text-align:center"  onclick="openFileBrowserSliderPhoto(); return false;" >Selectionner</a></h3>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('titre',array('label'=>'Nom d\'entreprise en français'));?>
					<?php echo $this->Form->input('titreen',array('label'=>'Nom d\'entreprise en anglais'));?>
					<?php echo $this->Form->input('titrear',array('label'=>'Nom d\'entreprise en arabe'));?>
					</td>
					<td><?php echo $this->Form->input('desc',array('label'=>'Description du Site Web en français'));?>
					<?php echo $this->Form->input('descen',array('label'=>'Description du Site Web en anglais'));?>
					<?php echo $this->Form->input('descar',array('label'=>'Description du Site Web en arabe'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('tel',array('label'=>'Téléphone'));?>
					</td>
					<td><?php echo $this->Form->input('tel2',array('label'=>'Téléphone secondaire'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('email',array('label'=>'Email Officiel'));?>
					</td>
					<td><?php echo $this->Form->input('fax',array('label'=>'Fax'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('codep',array('label'=>'Code Postale'));?>
					</td>
					<td><?php echo $this->Form->input('ville',array('label'=>'Ville en français'));?>
					<?php echo $this->Form->input('villeen',array('label'=>'Ville en anglais'));?>
					<?php echo $this->Form->input('villear',array('label'=>'Ville en arabe'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('pays',array('label'=>'Pays en français'));?>
					<?php echo $this->Form->input('paysen',array('label'=>'Pays en anglais'));?>
					<?php echo $this->Form->input('paysar',array('label'=>'Pays en arabe'));?>
					</td>
					<td><?php echo $this->Form->input('adresse',array('label'=>'Adresse Postale en français'));?>
					<?php echo $this->Form->input('adresseen',array('label'=>'Adresse Postale en anglais'));?>
					<?php echo $this->Form->input('adressear',array('label'=>'Adresse Postale en arabe'));?>
					</td>
				</tr>
			</table>
<?php echo $this->Form->input('contacttext',array('label'=>'Text de la page de Demande de devis en français'));?>
<?php echo $this->Form->input('contacttexten',array('label'=>'Text de la page de Demande de devis en anglais'));?>
<?php echo $this->Form->input('contacttextar',array('label'=>'Text de la page de Demande de devis en arabe'));?>			
		</div>	
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confid');">Identifications</h2>
		<div class="infosdemande"  id="confid" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('siret',array('label'=>'SIRET'));?>
					</td>
					<td><?php echo $this->Form->input('siren',array('label'=>'SIREN'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('ape',array('label'=>'APE'));?>
					</td>
					<td><?php echo $this->Form->input('rcs',array('label'=>'RCS'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confcalc');">Paramètres des calculs</h2>
		<div class="infosdemande"  id="confcalc" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('Devises',array('label'=>'Devise'));?>
					</td>
					<td><?php echo $this->Form->input('poids',array('label'=>'Unité de poids'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('volume',array('label'=>'Unité de volumes'));?>
					</td>
					<td><?php echo $this->Form->input('distance',array('label'=>'Unité de distances'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('conffact');">Paramètres de facturation</h2>
		<div class="infosdemande" id="conffact" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('cpaiement',array('label'=>'Conditions de paiement','options'=>array('0 jours'=>'0 jours','7 jours'=>'7 jours','14 jours'=>'14 jours','30 jours'=>'30 jours','60 jours'=>'60 jours','90 jours'=>'90 jours','Plus de 90 jours'=>'Plus de 90 jours')));?>
					</td>
					<td><?php echo $this->Form->input('iretard',array('label'=>'Intérêts de retard en %'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('conftva');">Paramètres de TVA</h2>
		<div class="infosdemande" id="conftva" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('dtva',array('label'=>'Déclaration de TVA','options'=>array('0'=>'Non assujetti à la TVA','Mensuelle'=>'Mensuelle','Trimestrielle'=>'Trimestrielle','Annuelle'=>'Annuelle')));?>
					</td>
					<td><?php echo $this->Form->input('tva',array('label'=>'TVA par défaut'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('ntva',array('label'=>'N° TVA'));?>
					</td>
					<td>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confaff');">Contrôle d'affichage (site web)</h2>
		<div class="infosdemande"  id="confaff" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('siteweb',array('label'=>'Activer le site web ?','options'=>array('1'=>'Oui','0'=>'Non')));?>
					</td>
					<td><?php echo $this->Form->input('menu',array('label'=>'Afficher le menu ?','options'=>array('1'=>'Oui','0'=>'Non')));?>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><?php echo $this->Form->input('qui',array('label'=>'Afficher la page "Qui Somme Nous"?','options'=>array('1'=>'Oui','0'=>'Non'))); echo $this->Form->input('quitext',array('label'=>'Text d\'affichage en français')); echo $this->Form->input('quitexten',array('label'=>'Text d\'affichage en anglais')); echo $this->Form->input('quitextar',array('label'=>'Text d\'affichage en arabe'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('pour',array('label'=>'Afficher la page "Pourquoi Nous"?','options'=>array('1'=>'Oui','0'=>'Non'))); echo $this->Form->input('pourtext',array('label'=>'Text d\'affichage en français')); echo $this->Form->input('pourtexten',array('label'=>'Text d\'affichage en anglais')); echo $this->Form->input('pourtextar',array('label'=>'Text d\'affichage en arabe'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('produits',array('label'=>'Afficher les Produits dans le menu ?','options'=>array('1'=>'Oui','0'=>'Non'))); echo $this->Form->input('produitstext',array('label'=>'Text d\'affichage en français')); echo $this->Form->input('produitstexten',array('label'=>'Text d\'affichage en anglais')); echo $this->Form->input('produitstextar',array('label'=>'Text d\'affichage en arabe'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('services',array('label'=>'Afficher les Services dans le menu ?','options'=>array('1'=>'Oui','0'=>'Non'))); echo $this->Form->input('servicestext',array('label'=>'Text d\'affichage en français')); echo $this->Form->input('servicestexten',array('label'=>'Text d\'affichage en anglais')); echo $this->Form->input('servicestextar',array('label'=>'Text d\'affichage en arabe'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('nouveates',array('label'=>'Afficher les nouveautés dans le menu ?','options'=>array('1'=>'Oui','0'=>'Non'))); echo $this->Form->input('nouveatestext',array('label'=>'Text d\'affichage en français')); echo $this->Form->input('nouveatestexten',array('label'=>'Text d\'affichage an anglais')); echo $this->Form->input('nouveatestextar',array('label'=>'Text d\'affichage an arabe'));?>
					</td>
				</tr>
			</table>								
		</div>	
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confsoc');">Réseaux sociaux</h2>
		<div class="infosdemande"  id="confsoc" style="display:none">
			<table>	
				<tr>
					<td><?php echo $this->Form->input('twitter',array('label'=>'Twitter'));?>
					</td>
					<td><?php echo $this->Form->input('facebook',array('label'=>'Facebook'));?>
					</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('gplus',array('label'=>'Google Plus'));?>
					</td>
					<td><?php echo $this->Form->input('youtube',array('label'=>'Youtube'));?>
					</td>
				</tr>
			</table>								
		</div>
<h2 style="margin:10px 10px 10px 10px;"  onclick="confaffichage('confsta');">Statistiques du site</h2>
		<div class="infosdemande"  id="confsta" style="display:none">
			<table>	
				<tr>
					<td style="width:50%"><?php echo $this->Form->input('analytics',array('label'=>'Tracking ID (google analytics)'));?>
					</td>
					<td><strong></strong>
					</td>
				</tr>
			</table>								
		</div>
<?php 
echo $this->Form->input('id',array('type' => 'hidden'));
 echo $this->Form->end('Appliquer les Configurations'); 
?>			
<?php } ?>

 
 <script>
 function confaffichage(e){
	if(document.getElementById(e).style.display=="none")
		document.getElementById(e).style.display = 'block';
	else
		document.getElementById(e).style.display = 'none';
 }
 </script>
 </div>