<?php if($this->Session->read('lng')=="fr"){ ?>
<div style="clear:both;"></div>
<br>
<hr>
<table>
	<tr>
	<td>
	<div class="commandersec">
						<h3>Nous pouvons vous assurer à 100%  votre confidentialité et sécurité.</h3>
						<h4>Pour plus d'informations consulter notre <a href="http://www.votrecodeur.com/pages/consultation/1/Politique_de_confidentialite" target="_blanck">Politique de confidentialité</a>.</h4>
			</div>
	</td>
	<td>
	<p>Paiement 100% sécurisé</p>
	<p><img src="http://www.votrecodeur.com/img/images/mPaiementFooter.jpg" alt="moyens de paiement"></p>
	</td>
	
	</tr>
</table>

<?php }else{ ?>
<div style="clear:both;"></div>
<br>
<hr>
<table>
	<tr>
	<td>
	 
	<div class="commandersec">
						<h3>We can assure you 100% your privacy and security.</h3>
						<h4>For more information visit our <a href="http://www.votrecodeur.com/pages/consultation/1/Privacy_Policy" target="_blanck">Privacy Policy</a>.</h4>
			</div>
	</td>
	<td>
	<p>100% secure payment</p>
	<p><img src="http://www.votrecodeur.com/img/images/mPaiementFooter.jpg" alt="Payment Methodes"></p>
	</td>
	
	</tr>
</table>
<?php } ?>