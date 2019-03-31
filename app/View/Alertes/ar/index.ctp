<div class="affichagear"> 
	<table>
	<tr>
		<th>تفاصيل</th>
		<th>التنبيهات</th>
		<th>النوع</th>
		</tr>
	<?php if($matrerielex>0 || $matrerielzero>0){ ?>
		<tr>
			<td class="strongs">
				<?php if($employecinex>0){?><a href="<?=$this->Html->url('/employes/cin')?>" >إظهار القائمة</a><?php }?>
				<?php if($employecontex>0){?><br><br><a href="<?=$this->Html->url('/employes/contrats')?>" >إظهار القائمة</a><?php }?>
				<?php if($vacanceterminer>0){?><br><br><a href="<?=$this->Html->url('/vacances/t')?>" >إظهار القائمة</a><?php }?>
			</td>
			<td class="strongs">
				<?php if($employecinex>0){?>البطاقات المنتهية <font color="red"><?php echo $employecinex."</font><br><br>"; }?>
				<?php if($employecontex>0){?>العقود المنتهية <font color="red"><?php echo $employecontex."</font><br><br>"; }?>
				<?php if($vacanceterminer>0){?>الإجازات المنتهية <font color="red"><?php echo $vacanceterminer."</font><br><br>"; }?>
			</td>
			<td><h2>المستخدمين</h2></td>
		</tr>
	<?php } if($matrerielex>0 || $matrerielzero>0){ ?>
		<tr>
			<td class="strongs">
				<?php if($matrerielex>0){?><a href="<?=$this->Html->url('/materiels/t')?>" >إظهار القائمة</a><?php }?>
				<?php if($matrerielzero>0){?><br><br><a href="<?=$this->Html->url('/materiels/z')?>" >إظهار القائمة</a><?php }?>
			</td>
			<td class="strongs">
				<?php if($matrerielex>0){?>إنتهت <font color="red"><?php echo $matrerielex."</font><br><br>"; }?>
				<?php if($matrerielzero>0){?>كمية فارغة <font color="red"><?php echo $matrerielzero."</font><br><br>"; }?>
			</td>
			<td><h2>المخزون</h2></td>
		</tr>
	<?php } if($contratt>0 || $devissans>0){ ?>
		<tr>
			<td class="strongs">
				<?php if($contratt>0){?><a href="<?=$this->Html->url('/contrats/t')?>" >إظهار القائمة</a><?php }?>
				<?php if($devissans>0){?><br><br><a href="<?=$this->Html->url('/devises/s')?>" >إظهار القائمة</a><?php }?>
			</td>
			<td class="strongs">
				<?php if($contratt>0){?>العقود المنتهية<font color="red"><?php echo $contratt."</font><br><br>"; }?>
				<?php if($devissans>0){?>مقايسات بدون جواب<font color="red"><?php echo $devissans."</font>"; }?>
			</td>
			<td><h2>إدارة الأعمال</h2></td>
		</tr>
	<?php } if($recettesum-$depensesum<0){ ?>
		<tr>
			<td class="strongs" >مصاريف <font color="red">></font> إيرادات 
			<br><font color="red"><?php echo ($recettesum-$depensesum)*-1; echo " ".$config['Configuration']['Devises'];?></font></td>
			<td><h2><font color="red">الدوران سلبي</font></h2></td>
			<td><h2>المحاسبة</h2></td>
		</tr>
	<?php } ?>
	</table>
</div>