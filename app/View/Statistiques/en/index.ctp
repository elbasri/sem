<div align="center">
<div class="affichage"> 
<div  align="center" class="menufooter">
	<div style="display:inline-block; " >				
	<ul class="mega-container mega-grey" >
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statistiques')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/database_table.png');?><font class="widthcent3">Tableur</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statistiques/histogramme')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/chart_bar.png');?><font class="widthcent3">Histogramme</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/statistiques/graphique')?>" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/chart_pie.png');?><font class="widthcent3">Graphe</font></a>
		</li>
		<li class="mega mega-current widthcent4" >
		<a href="<?=$this->Html->url('/')?>statistiques/imprimers/" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer.png');?><font class="widthcent3">Imprimer le Tableur</font></a>
		</li>
	</ul>
	</div>
</div>
<?php 

//foreach($sum as $sum):
//endforeach; unset($sum);
$sge =$config['Configuration']['titre'];
$devise =$config['Configuration']['Devises'];

?>
 <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
//0-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Dépenses en <?php echo $devise;?>', <?php echo $depensesum;?>],
          ['Recettes en <?php echo $devise;?>', <?php echo $recettesum;?>],
          ['Taux du stock en <?php echo $devise;?>', <?php echo $stocksum;?>],
          ['Taux des Biens en <?php echo $devise;?>', <?php echo $bienssum;?>],
          ['Taux des Congés en <?php echo $devise;?>', <?php echo $congessum;?>],
          ['Taux des Salaires en <?php echo $devise;?>', <?php echo $saliressum;?>],
          ['Taux de Primes <?php echo $devise;?>', <?php echo $primessum;?>]
        ]);

        // Set chart options
        var options = {'title':'Chiffre d\'affaires et Comptes financiers','width':700,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div0'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		}
</script>
<div style="width: 100%; background-color:#fff" align="center">
<div id="chart_div0" style="float:none;margin-left:5%" align="center"></div>
</div>
	<table>
	<tr>
		<th>Statistique</th>
		<th>Number</th>
		<th>Details</th>
		</tr>
		<tr>
			<td><h2>Employées</h2></td>
			<td class="strongs"><?php echo $Employecount;?></td>
			<td>
				<table>
					<tr><td>NB d'employes par sexe</td>
						<td class="strongs">
							<table>
							<tr><td>Monsieurs</td> <td class="strongs"><?php echo $employemr;?></td></tr>
							<tr><td>Madames </td><td class="strongs"><?php echo $employemme;?></td></tr>
							<tr><td>Demoiselles </td><td class="strongs"><?php echo $employemlle;?></td></tr>
							</table>
						</td>
					</tr>
					<tr><td>NB d'employes par notes</td>
						<td class="strongs">
							<table>
							<tr><td>mauvais </td><td class="strongs"><?php echo $employemv;?></td></tr>
							<tr><td>moyenne </td><td class="strongs"><?php echo $employemy;?></td></tr>
							<tr><td>bien </td><td class="strongs"><?php echo $employebn;?></td></tr>
							<tr><td>excellent </td><td class="strongs"><?php echo $employeex;?></td></tr>
							</table>
						</td>
					</tr>
					
					<tr><td>CIN expirés </td><td class="strongs"><?php echo $employecinex;?></td></tr>
					<tr><td>Contrats expirés </td><td class="strongs"><?php echo $employecontex;?></td></tr>
					<tr><td>Spécialités</td><td class="strongs"><?php echo $Specialitecount;?></td></tr>
					<tr><td>Tâche effectués</td>
						<td class="strongs">
							<table>
							<tr><td>Encours</td> <td class="strongs"><?php echo $tacheencours;?></td></tr>
							<tr><td>Terminés</td><td class="strongs"><?php echo $tacheterminer;?></td></tr>
							</table>
						</td>
					</tr>
					<tr><td>Primes</td><td class="strongs"><?php echo $Primecount;?></td></tr>
					<tr><td>Congés</td>
						<td class="strongs">
							<table>
							<tr><td>Encours</td> <td class="strongs"><?php echo $vacanceencours;?></td></tr>
							<tr><td>Terminés</td><td class="strongs"><?php echo $vacanceterminer;?></td></tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Articles du stock</h2></td>
			<td class="strongs"><?php echo $Materielcount;?></td>
			<td>
				<table>
					<tr><td>Expirés</td><td class="strongs"><?php echo $matrerielex;?></td></tr>
					<tr><td>Conservés</td><td class="strongs"><?php echo $matrerielcon;?></td></tr>
					<tr><td>Opérations d'entrée</td><td class="strongs"><?php echo $entree;?></td></tr>
					<tr><td>Opérations de sortie</td><td class="strongs"><?php echo $sortie;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>L'inventaire</h2></td>
			<td class="strongs"><?php echo $Inventairecount;?></td>
			<td>
				<table>
					<tr><td>Avec Contrat de garantie</td><td class="strongs"><?php echo $invcontratg;?></td></tr>
					<tr><td>Avec Contrat de Maintenance</td><td class="strongs"><?php echo $invcontratm;?></td></tr>
					<tr><td>Avec Contrat d'assurance</td><td class="strongs"><?php echo $invcontrata;?></td></tr>
					<tr><td>Avec Contrat de location</td><td class="strongs"><?php echo $invcontratl;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>CRM/Contacts</h2></td>
			<td class="strongs"><?php echo $Clientcount;?></td>
			<td>
				<table>
					<tr><td>Clients</td> <td class="strongs"><?php echo $clients;?></td></tr>
					<tr><td>Fournisseurs </td><td class="strongs"><?php echo $fournisseurs;?></td></tr>
					<tr><td>Fabricants </td><td class="strongs"><?php echo $fabricants;?></td></tr>
					<tr><td>Sosiétés de maintenance </td><td class="strongs"><?php echo $smaintenance;?></td></tr>
					<tr><td>Sosiétés d'assurance </td><td class="strongs"><?php echo $sassurance;?></td></tr>
					<tr><td>Sosiétés de location </td><td class="strongs"><?php echo $slocation;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Projets</h2></td>
			<td class="strongs"><?php echo $Projetcount;?></td>
			<td>
				<table>
					<tr><td>Terminés</td><td class="strongs"><?php echo $projetterminer;?></td></tr>
					<tr><td>Encours</td> <td class="strongs"><?php echo $projetencours;?></td></tr>
					<tr><td>A venir</td><td class="strongs"><?php echo $projetavenir;?></td></tr>
					<tr><td>Namebre de Realisations</td><td class="strongs"><?php echo $Realisationcount;?></td></tr>
				</table>
			</td>
		</tr>
		
		<tr>
			<td><h2>Gestion Commerciale</h2></td>
			<td class="strongs">___</td>
			<td>
				<table>
					<tr><td>Contrats</td>
						<td class="strongs">
							<table>
							<tr><td>Contrats expirés </td> <td class="strongs"><?php echo $contratt;?></td></tr>
							<tr><td>Contrats valides </td><td class="strongs"><?php echo $contrate;?></td></tr>
							<tr><td>C. Garantie </td><td class="strongs"><?php echo $contratg;?></td></tr>
							<tr><td>C. Maintenance </td><td class="strongs"><?php echo $contratm;?></td></tr>
							<tr><td>C. Assurance </td><td class="strongs"><?php echo $contrata;?></td></tr>
							<tr><td>C. Location </td><td class="strongs"><?php echo $contratl;?></td></tr>
							</table>
						</td>
					</tr>
					<tr><td>Devis</td>
						<td class="strongs">
							<table>
							<tr><td>Sans réponse </td><td class="strongs"><?php echo $devissans;?></td></tr>
							<tr><td>Accepté </td><td class="strongs"><?php echo $devisaccepte;?></td></tr>
							<tr><td>Refusé </td><td class="strongs"><?php echo $devisref;?></td></tr>
							</table>
						</td>
					</tr>
					<tr><td>Factures</td>
						<td class="strongs">
							<table>
							<tr><td>Réglée </td><td class="strongs"><?php echo $facturereg;?></td></tr>
							<tr><td>Non réglée </td><td class="strongs"><?php echo $facturenonreg;?></td></tr>
							</table>
						</td>
					</tr>
					<tr><td>Commandes</td>
						<td class="strongs">
							<table>
							<tr><td>A envoyer </td><td class="strongs"><?php echo $commandeae;?></td></tr>
							<tr><td>Arrivage </td><td class="strongs"><?php echo $commandear;?></td></tr>
							</table>
						</td>
					</tr>
					
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Comptabilité</h2></td>
			<td class="strongs">Chiffre d'affaires <?php echo $recettesum+$depensesum; echo " ".$config['Configuration']['Devises'];?></td>
			<td>
				<table>
					<tr><td><font color="red"><?php echo $comptarec;?></font> Recettes</td><td class="strongs"><?php echo $recettesum." ".$config['Configuration']['Devises'];?></td></tr>
					<tr><td><font color="red"><?php echo $comptadep;?></font> Dépenses</td><td class="strongs"><?php echo $depensesum." ".$config['Configuration']['Devises'];?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Localisations et classifications</h2></td>
			<td></td>
			<td>
				<table>
					<tr><td>Localisations</td><td class="strongs"><?php echo $Piececount;?></td></tr>
					<tr><td>Marques</td><td class="strongs"><?php echo $marques;?></td></tr>
					<tr><td>Familles</td><td class="strongs"><?php echo $familles;?></td></tr>
					<tr><td>Imputations</td><td class="strongs"><?php echo $imputations;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Utilisateurs</h2></td>
			<td class="strongs"><?php echo $Usercount;?></td>
			<td>
				<table>
					<tr><td>Actives</td> <td class="strongs"><?php echo $useractive;?></td></tr>
					<tr><td>Inactives </td><td class="strongs"><?php echo $userinactive;?></td></tr>
					<tr><td>Administrateurs </td><td class="strongs"><?php echo $useradmins;?></td></tr>
					<tr><td>Employes </td><td class="strongs"><?php echo $useremployes;?></td></tr>
					<tr><td>Clients </td><td class="strongs"><?php echo $userclients;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Demandes</h2></td>
			<td class="strongs"><?php echo $Demandecount;?></td>
			<td>
				<table>
					<tr><td>Lu</td> <td class="strongs"><?php echo $demandelu;?></td></tr>
					<tr><td>Non lu </td><td class="strongs"><?php echo $demandenonlu;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Services</h2></td>
			<td class="strongs"><?php echo $Servicecount;?></td>
			<td>
				<table>
					<tr><td>Publiées</td> <td class="strongs"><?php echo $servicepublier;?></td></tr>
					<tr><td>En brouillons </td><td class="strongs"><?php echo $servicenonpublier;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Produits</h2></td>
			<td class="strongs"><?php echo $Produitcount;?></td>
			<td>
				<table>
					<tr><td>Publiées</td> <td class="strongs"><?php echo $produitpublier;?></td></tr>
					<tr><td>En brouillons </td><td class="strongs"><?php echo $produitnonpublier;?></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><h2>Pages</h2></td>
			<td class="strongs"><?php echo $Pagecount;?></td>
			<td>
				<table>
					<tr><td>Publiées</td> <td class="strongs"><?php echo $pagepublier;?></td></tr>
					<tr><td>En brouillons </td><td class="strongs"><?php echo $pagenonpublier;?></td></tr>
				</table>
			</td>
		</tr>
		
	</table>
 </div>
</div>