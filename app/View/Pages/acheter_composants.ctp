<?php
$titre='Acheter des applications,scripts,données et autres En Ligne sur votrecodeur.com';
$this->element('meta',array('titre'=>$titre));
?>
<div class="recruterdiv1" align="center">
<h1 class="recrutertitle">Acheter des applications,scripts,données et autres En Ligne sur votrecodeur.com</h1>
<p class="recruterdesc">le deuxiemme test de titre SMALL</p>

			<table >
			<tr >
			<th class="imgstitle" width="250" height="50">Types des Produits proposé par votrecodeur.com</th>
			<th class="imgstitle" width="250">Pourquoi Acheter sur votrecodeur.com ?</th>
			<th class="imgstitle" width="250">Vos Profites</th>
			</tr>
			
			<tr>
			<td class="imgs2">sfjso</td>
			<td class="imgs2">sdkfs</td>
			<td class="imgs2">sdflskd</td>
			</tr>
			
			<tr>
			<td class="imgs2">orieg</td>
			<td class="imgs2">riozjlrtzkltjkfler</td>
			<td class="imgs2">kejlfhqkmghqrjkmeghqerjkgh jekhgkqe</td>
			</tr>
			</table>
			
			<br><br>

</div>
<div class="recruterdiv2" align="center">
	<fieldset><legend><h2 class="recrutersubtitle">Acheter un composant partielle pour votre SITE WEB ou LOGICIEL de bureau</h2></legend>
		<form action="api/" method="post" id="frm1" name="frm1">
			<table width="800" >
				<tr>
					<th class="webtitle" width="400">Nom de Composants</th>
					<th class="webtitle" width="100">Prix</th>
					<th class="webtitle" width="100">Remises</th>
				</tr>
				
				
				
				<tr>
					<td class="imgs3"><input type="checkbox" onclick="recruter('mailer')"  id="mailer" name="mailer" value="20"/> "Mailer Inbox" détaillée et securisé (<a href="post/1" target="_blanck">Voir les détails</a>)</td>
					<td class="imgs3">20  € </td><td class="imgs3">15 %</td>
				</tr>
				
				<tr>
					<td class="imgs3"><input type="checkbox" onclick="recruter('apipaypal')"  id="apipaypal" name="apipaypal" value="25"/> Module de paiement paypal professionnelle (<a href="post/2" target="_blanck">Voir les détails</a>)</td>
					<td class="imgs3">25  € </td><td class="imgs3">55 %</td>
				</tr>
				
				<tr>
					<td class="imgs3"><input type="checkbox" onclick="recruter('newsletter')"  id="newsletter" name="newsletter" value="12"/> Script de NEWSLETTER professionnelle (<a href="post/3" target="_blanck">Voir les détails</a>)</td>
					<td class="imgs3">12  € </td><td class="imgs3">75 %</td>
				</tr>
				
				<tr>
					<td class="imgs3"><input type="checkbox" onclick="recruter('basedonnee')"  id="basedonnee" name="basedonnee" value="12"/> Base de donnée plein d'infos (<a href="post/4" target="_blanck">Voir les détails</a>)</td>
					<td class="imgs3">12  € </td><td class="imgs3">75 %</td>
				</tr>
				<tr>
					<td class="imgs3"><input type="checkbox" onclick="recruter('maquette')"  id="maquette" name="maquette" value="55"/> Maquette Moderne et Professionnelle (<a href="post/5" target="_blanck">Voir les détails</a>)</td>
					<td class="imgs3">55  € </td><td class="imgs3">55 %</td>
				</tr>
				
				
				<tr>
					<td ></td>
					<td ><div align="center" class="totale">Totale <label id="totalelabel" name="totalelabel">0</label>  € </div> <div style="display: none;"><input type="text" name="totale" id ="totale" value="0"/></div></td>
					
					<td ><div align="center"><input type="button" value="" name="valider" class="recruterbouton" onclick="validerrecruter()"/></div></td>
					<div align="center" class="erreurlabel" id="erreurlabel" name="erreurlabel"></label></div>
					
				</tr>
				
			</table>
					<br><h4 style="color:red; font-size:14px">Remarque: Si ce que vous voulez n'est pas inclus dans cette liste, Merci de nous a envoyé une demande en <a href="demande" target="_blanck">cliquant ici</a></h4>
					
				
			<br>
		</form>
	</fieldset>

	<fieldset ><legend class="recrutersubtitle">Acheter un SITE WEB ou LOGICIEL Complete (création professionnel)</legend>
			<div align="center" class="packstable">
				<table>
					<tr>
					<td style="padding:15px 15px 15px 15px"><a href="<?=$this->Html->url('/services/view/8/Creation_des_sites_web_Pack_Presence')?>" title="Création de site web Pack Présence"><?php echo $this->Html->image('images/presence.png', array('alt' => 'Création de site web Pack Présence','title'=>'Création de site web Pack Présence'));?></a></td>
					<td style="padding:15px 15px 15px 15px"><a href="<?=$this->Html->url('/services/view/6/Creation_des_sites_web_Pack_Catalogue')?>" title="Création de site web Pack Catalogue"><?php echo $this->Html->image('images/catalogue.png', array('alt' => 'Création de site web Pack Catalogue','title'=>'Création de site web Pack Catalogue'));?></a></td>
					</tr>
					<tr>
					<td style="padding:15px 15px 15px 15px"><a href="<?=$this->Html->url('/services/view/7/Creation_des_sites_web_Pack_E_commerce')?>" title="Création E-Commerce"><?php echo $this->Html->image('images/ecommerce.png', array('alt' => 'Création E-Commerce','title'=>'Création E-Commerce'));?></a></td>
					<td style="padding:15px 15px 15px 15px"><a href="<?=$this->Html->url('/services/view/3/Acheter_des_Composants')?>" title="Création de logiciels"><?php echo $this->Html->image('images/logiciels.png', array('alt' => 'Création de logiciels','title'=>'Création de logiciels'));?></a></td>
					</tr>
				</table>
			</div>

	</fieldset>

	
</div>
