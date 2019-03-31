<?php
$tablet_browser = 0;
$mobile_browser = 0;
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
 
if ($tablet_browser > 0 || $mobile_browser > 0) {
 echo '<div class="affichage">';
}
else {
?>
<div class="menudetails">
 <?php echo $this->element('menudetails',array('type'=>'inventaire')); ?>
</div>
<div class="affichage" style="float:right;width:80%"> 
<?php } ?> 
<?php 
$titre=$post['Inventaire']['nom'];
$this->element('meta',array('titre'=>$titre));
?>

	<div class="infosdemande" >
			<table >
				<tr >
					<td style="width:35%">Numéro: <strong><?php echo $post['Inventaire']['id'];?></strong>
					</td>
					
					<td style="width:35%">Référence: <strong><?php echo $post['Inventaire']['ref'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Créé le: <strong><?php echo $post['Inventaire']['created'];?></strong>
					</td>
					
					<td style="width:35%">Modifié le: <strong><?php echo $post['Inventaire']['modified'];?></strong>
					</td>
				</tr>
			</table>
 <br><h2>Générale</h2>	
			<table >
				<tr >
					<td style="width:35%">Désignation: <strong><?php echo $post['Inventaire']['designation'];?></strong>
					</td>
					
					<td style="width:35%">Catégorie: <strong><?php echo $post['Inventaire']['categorie'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Conditionnement: <strong><?php echo $post['Inventaire']['conditionnement'];?></strong>
					</td>
					
					<td style="width:35%"></td>
				</tr>
				<tr >
					<td style="width:35%">Fabricant: <strong><?php echo $this->Html->link($post['Inventaire']['fabricant_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fabricant_id'],Inflector::slug($post['Inventaire']['fabricant_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Etat: <strong><?php echo $post['Inventaire']['etat'];?></strong>
					</td>
				</tr>
				
				<tr >
					<td style="width:35%">Ref. Fabricant: <strong><?php echo $post['Inventaire']['reffabricant'];?></strong>
					</td>
					
					<td style="width:35%">Niveau: <strong><?php echo $post['Inventaire']['niveau'];?></strong>
					</td>
				</tr>
				<tr >
					<td style="width:35%">Famille: <strong><?php echo $this->Html->link($post['Inventaire']['famille_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Inventaire']['famille_id'],Inflector::slug($post['Inventaire']['famille_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Marque: <strong><?php echo $this->Html->link($post['Inventaire']['marque_nom'],array('controller'=>'stockcategories','action'=>'view',$post['Inventaire']['marque_id'],Inflector::slug($post['Inventaire']['marque_nom'],$remplacement='_')));?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Localisation: <strong>
						<table>
							<tr><td>Locale</td><td><?php echo $this->Html->link($post['Inventaire']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Inventaire']['piece_id'],Inflector::slug($post['Inventaire']['piece_nom'],$remplacement='_')));?></td></tr>
							<tr><td>Emplacement</td><td><?php echo $post['Inventaire']['emplacement'];?></td></tr>
						</table>
					</td>
					<td style="width:35%"></td>
				</tr>
			</table>
			
 <br><h2>Administratif</h2>
			<table>
				<tr>
					<td style="width:35%">Fournisseur: <strong><?php echo $this->Html->link($post['Inventaire']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Inventaire']['fournisseur_id'],Inflector::slug($post['Inventaire']['fournisseur_nom'],$remplacement='_')));?></strong>
					</td>
					
					<td style="width:35%">Facture: <strong><?php echo $this->Html->link($post['Inventaire']['facture_nom'],array('controller'=>'factures','action'=>'view',$post['Inventaire']['facture_id'],Inflector::slug($post['Inventaire']['facture_nom'],$remplacement='_')));?></strong>
					</td>
				</tr>
				<tr>
					<td style="width:35%">Contrat de garantie: <strong><?php if($post['Inventaire']['contratg_id']!=0) echo $this->Html->link($post['Inventaire']['contratg_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contratg_id'],Inflector::slug($post['Inventaire']['contratg_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
					
					<td style="width:35%">Contrat de Maintenance: <strong><?php if($post['Inventaire']['contratm_id']!=0) echo $this->Html->link($post['Inventaire']['contratm_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contratm_id'],Inflector::slug($post['Inventaire']['contratm_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
				</tr>
				<tr>
					<td style="width:35%">Contrat d'assura,ce: <strong><?php if($post['Inventaire']['contrata_id']!=0) echo $this->Html->link($post['Inventaire']['contrata_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contrata_id'],Inflector::slug($post['Inventaire']['contrata_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
					
					<td style="width:35%">Contrat de location: <strong><?php if($post['Inventaire']['contratl_id']!=0) echo $this->Html->link($post['Inventaire']['contratl_nom'],array('controller'=>'contrats','action'=>'view',$post['Inventaire']['contratl_id'],Inflector::slug($post['Inventaire']['contratl_nom'],$remplacement='_'))); else echo "Aucun";?></strong></td>
				</tr>
			</table>
<br><h2>Donnée Comptables</h2>
   			<table>
				<tr>
					<td style="width:35%">Quantité: <strong><?php echo $post['Inventaire']['qte']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
					
					<td style="width:35%">Valeur Marchande: <strong><?php echo $post['Inventaire']['prixv']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
				</tr>
				
				<tr>
					<td style="width:35%">Prix d'achat: <strong><?php echo $post['Inventaire']['prix']; echo " ".$config['Configuration']['Devises'];?></strong>
					</td>
					
					<td style="width:35%">Prix Totale: <strong><?php echo $post['Inventaire']['prix']*$post['Inventaire']['qte']; echo " ".$config['Configuration']['Devises'];?></strong></td>
				</tr>
			</table>
			
			
 <br><h2>Plus d'informations</h2>
 <?php echo $post['Inventaire']['infos'];?>
<div align="center">
					<strong>
					<a href="<?=$this->Html->url('/')?>inventaires/modifier/<?php echo $post['Inventaire']['id']?>" ><img src="<?=$this->Html->url('/')?>img/images/modifier.png" alt="modifier"/></a>
					<a href="<?=$this->Html->url('/')?>inventaires/imprimer/<?php echo $post['Inventaire']['id']?>" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/imprimer.png" alt="imprimer"/></a>
					<a href="<?=$this->Html->url('/')?>inventaires/imprimer/<?php echo $post['Inventaire']['id']?>/pdf" target="_blank"><img src="<?=$this->Html->url('/')?>img/images/exporter.png" alt="exporter"/></a>
					</strong>
</div>			
	</div>	
		
</div>