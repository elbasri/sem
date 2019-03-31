<form name="quote" id="enquiryformpage" action="demandeenvoyer" method="post" >
<div class="affichage" >
	<h2>Demande</h2>
		<p style="padding-left:20px;">
			<strong>
			Pour entrer en contact pour les services s'il vous plaît contacter à demande@votrecodeur.com ou simplement nous appeler au +212 676 47 95 81.<br>
			Vous pouvez également nous envoyer un courriel pour demander un service particulier par remplissage le formulaire au-dessous.
			</strong>
		</p>
	<br>
	<h2>Vos informations de contact</h2>
		<div class="infosdemande" >
			<table >	
				<tr >
					<td><img src="../../../img/images/nomdemande.png"/><input type="text" tabindex="1" name="name" id="name" value="" placeholder="Votre Nom" ></td>
					<td><img src="../../../img/images/emaildemande.png"/><input type="text" tabindex="2" name="email" id="email" value="" placeholder="Votre Adresse Email" ></td>
				</tr>
				<tr>
					<td><img src="../../../img/images/secietedemande.png"/><input type="text"  tabindex="3" name="company_name"  id="company_name" value="" placeholder="Votre Société" ></td>
					<td><img src="../../../img/images/telephonedemande.png"/><input type="text"  tabindex="4" name="phone" id="phone" value="" placeholder="Numéro de Téléphone" ></td>
				</tr>
			</table>								
		</div>			
	<br>
	<h2>Détails du projet <font color="red">*</font></h2>
		<div class="projetdemande" >
				<textarea tabindex="5"  name="sujet"  id="sujet" ></textarea>
		</div>						
						<div id="erreur_message" class="erreur_message" ></div>		
				</form>
				<table>
				<tr>
					<td><div class="demandesec"/>
						<h3>Nous pouvons vous assurer à 100%  votre confidentialité et sécurité.</h3>
						<h4>Pour plus d'informations consulter notre <a href="politique" target="_blanck">Politique de confidentialité</a>.</h4>
					</div></td>
					
					<td><a href="javascript:void(0);"  onclick="return validate_quote();" title="Envoyer Demande"><img src="../../../img/images/bouton_envoyer_gris.jpg" /></a></td>
				</tr>
				</table>
</div>