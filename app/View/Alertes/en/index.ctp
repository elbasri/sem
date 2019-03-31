<div class="affichage"> 
	<table>
	<tr>
		<th>Type</th>
		<th>Alerts</th>
		<th>Details</th>
		</tr>
	<?php if($matrerielex>0 || $matrerielzero>0){ ?>
		<tr>
			<td><h2>Employées</h2></td>
			<td class="strongs">
				<?php if($employecinex>0){?>CIN expirés: <font color="red"><?php echo $employecinex."</font><br><br>"; }?>
				<?php if($employecontex>0){?>Contrats du travail expirés: <font color="red"><?php echo $employecontex."</font><br><br>"; }?>
				<?php if($vacanceterminer>0){?>leave Dones: <font color="red"><?php echo $vacanceterminer."</font><br><br>"; }?>
			</td>
			<td class="strongs">
				<?php if($employecinex>0){?><a href="<?=$this->Html->url('/employes/cin')?>" >Afficher la liste </a><?php }?>
				<?php if($employecontex>0){?><br><br><a href="<?=$this->Html->url('/employes/contrats')?>" >Afficher la liste </a><?php }?>
				<?php if($vacanceterminer>0){?><br><br><a href="<?=$this->Html->url('/vacances/t')?>" >Afficher la liste </a><?php }?>
			</td>
		</tr>
	<?php } if($matrerielex>0 || $matrerielzero>0){ ?>
		<tr>
			<td><h2>Articles du stock</h2></td>
			<td class="strongs">
				<?php if($matrerielex>0){?>Expirés: <font color="red"><?php echo $matrerielex."</font><br><br>"; }?>
				<?php if($matrerielzero>0){?>Zéro Quantité: <font color="red"><?php echo $matrerielzero."</font><br><br>"; }?>
			</td>
			<td class="strongs">
				<?php if($matrerielex>0){?><a href="<?=$this->Html->url('/materiels/t')?>" >Afficher la liste </a><?php }?>
				<?php if($matrerielzero>0){?><br><br><a href="<?=$this->Html->url('/materiels/z')?>" >Afficher la liste </a><?php }?>
			</td>
		</tr>
	<?php } if($contratt>0 || $devissans>0){ ?>
		<tr>
			<td><h2>Gestion Commerciale</h2></td>
			<td class="strongs">
				<?php if($contratt>0){?>Contrats expirés: <font color="red"><?php echo $contratt."</font><br><br>"; }?>
				<?php if($devissans>0){?>Devis Sans réponse: <font color="red"><?php echo $devissans."</font>"; }?>
			</td>
			<td class="strongs">
				<?php if($contratt>0){?><a href="<?=$this->Html->url('/contrats/t')?>" >Afficher la liste</a><?php }?>
				<?php if($devissans>0){?><br><br><a href="<?=$this->Html->url('/devises/s')?>" >Afficher la liste</a><?php }?>
			</td>
		</tr>
	<?php } if($recettesum-$depensesum<0){ ?>
		<tr>
			<td><h2>Comptabilité</h2></td>
			<td><h2><font color="red">Le chiffre d'affaires est négatif</font></h2></td>
			<td class="strongs" >Dépenses <font color="red">></font> Recettes de <font color="red"><?php echo ($recettesum-$depensesum)*-1; echo " ".$config['Configuration']['Devises'];?></font></td>
		</tr>
	<?php } ?>
	</table>
</div>