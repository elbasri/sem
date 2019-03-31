 <div align="center">
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
		<a href="<?=$this->Html->url('/')?>statistiques/imprimerhistogramme/" class="mega-link btn widthcent2"><?php echo $this->Html->image('icons/printer.png');?><font class="widthcent3">Imprimer l'Histogramme</font></a>
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
//1-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Monsieurs');
        data.addColumn('number', 'Madames');
        data.addColumn('number', 'Demoiselles');
        data.addRows([
          ['Employes par sexe', <?php echo $employemr;?>,<?php echo $employemme;?>,<?php echo $employemlle;?>]
        ]);

        // Set chart options
        var options = {'title':'Employes par sexe','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
//2-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'mauvais');
        data.addColumn('number', 'moyenne');
        data.addColumn('number', 'bien');
        data.addColumn('number', 'excellent');
        data.addRows([
          ['Employes par notes', <?php echo $employemv;?>, <?php echo $employemy;?>, <?php echo $employebn;?>, <?php echo $employeex;?>]
        ]);

        // Set chart options
        var options = {'title':'Employes par notes','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
//3-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['CIN expirés', <?php echo $employecinex;?>],
          ['Contrats expirés', <?php echo $employecontex;?>]
        ]);

        // Set chart options
        var options = {'title':'Statut d\'expiration','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
//4-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Encours');
        data.addColumn('number', 'Terminés');
        data.addRows([
          ['Tâches', <?php echo $tacheencours;?>, <?php echo $tacheterminer;?>]
        ]);

        // Set chart options
        var options = {'title':'Statut de Tâches','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
//5-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Encours');
        data.addColumn('number', 'Terminés');
        data.addRows([
          ['Congés', <?php echo $vacanceencours;?>, <?php echo $vacanceterminer;?>]
        ]);

        // Set chart options
        var options = {'title':'Statut de Congés','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
//6-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Spécialités');
        data.addColumn('number', 'Primes');
        data.addRows([
          ['Nombre', <?php echo $Specialitecount;?>,<?php echo $Primecount;?>]
        ]);

        // Set chart options
        var options = {'title':'Autres (Ressources humaines)','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div5'));
        chart.draw(data, options);
//7-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Expirés');
        data.addColumn('number', 'Conservés');
        data.addRows([
          ['Articles', <?php echo $matrerielex;?>, <?php echo $matrerielcon;?>]
        ]);

        // Set chart options
        var options = {'title':'Statut de consérvation d\'articles','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div6'));
        chart.draw(data, options);
//8-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'entrée');
        data.addColumn('number', 'sortie');
        data.addRows([
          ['Opérations', <?php echo $entree;?>, <?php echo $sortie;?>]
        ]);

        // Set chart options
        var options = {'title':'Journale du stock','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div7'));
        chart.draw(data, options);
//9-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Garantie');
        data.addColumn('number', 'Maintenance');
        data.addColumn('number', 'Assurance');
        data.addColumn('number', 'Location');
        data.addRows([
          ['Avec Contrat de', <?php echo $invcontratg;?>, <?php echo $invcontratm;?>, <?php echo $invcontrata;?>, <?php echo $invcontratl;?>]
        ]);

        // Set chart options
        var options = {'title':'L\'inventaire','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div8'));
        chart.draw(data, options);
//10-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Clients');
        data.addColumn('number', 'Fournisseurs');
        data.addColumn('number', 'Fabricants');
        data.addColumn('number', 'S.Maintenance');
        data.addColumn('number', 'S.Assurance');
        data.addColumn('number', 'S.Location');
        data.addRows([
          ['Type', <?php echo $clients;?>, <?php echo $fournisseurs;?>, <?php echo $fabricants;?>, <?php echo $smaintenance;?>, <?php echo $sassurance;?>, <?php echo $slocation;?>]
        ]);

        // Set chart options
        var options = {'title':'CRM/Contacts','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div9'));
        chart.draw(data, options);
//11-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Terminés');
        data.addColumn('number', 'Encours');
        data.addColumn('number', 'A venir');
        data.addColumn('number', 'Réalisations');
        data.addRows([
          ['Type', <?php echo $projetterminer;?>, <?php echo $projetencours;?>, <?php echo $projetavenir;?>, <?php echo $Realisationcount;?>]
        ]);

        // Set chart options
        var options = {'title':'Projets','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div10'));
        chart.draw(data, options);
//12-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Expirés');
        data.addColumn('number', 'Valides');
        data.addColumn('number', 'De Garantie');
        data.addColumn('number', 'De Maintenance');
        data.addColumn('number', 'D\'Assurance');
        data.addColumn('number', 'De Location');
        data.addRows([
          ['Type', <?php echo $contratt;?>, <?php echo $contrate;?>, <?php echo $contratg;?>, <?php echo $contratm;?>, <?php echo $contrata;?>, <?php echo $contratl;?>]
        ]);

        // Set chart options
        var options = {'title':'Contrats','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div11'));
        chart.draw(data, options);
//13-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Sans réponse');
        data.addColumn('number', 'Accepté');
        data.addColumn('number', 'Refusé');
        data.addRows([
          ['Statut', <?php echo $devissans;?>, <?php echo $devisaccepte;?>, <?php echo $devisref;?>]
        ]);

        // Set chart options
        var options = {'title':'Devis','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div12'));
        chart.draw(data, options);
//14-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Réglée');
        data.addColumn('number', 'Non réglée');
        data.addRows([
          ['Statut', <?php echo $facturereg;?>, <?php echo $facturenonreg;?>]
        ]);

        // Set chart options
        var options = {'title':'Factures','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div13'));
        chart.draw(data, options);
//14-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'A envoyer');
        data.addColumn('number', 'Arrivage');
        data.addRows([
          ['Type', <?php echo $commandeae;?>, <?php echo $commandear;?>]
        ]);

        // Set chart options
        var options = {'title':'Commandes','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div13'));
        chart.draw(data, options);
//15-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Recettes');
        data.addColumn('number', 'Dépenses');
        data.addRows([
          ['Comptes', <?php echo $comptarec;?>, <?php echo $comptadep;?>]
        ]);

        // Set chart options
        var options = {'title':'Comptabilité','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div14'));
        chart.draw(data, options);
//16-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Localisations');
        data.addColumn('number', 'Marques');
        data.addColumn('number', 'Familles');
        data.addColumn('number', 'Imputations');
        data.addRows([
          ['Type', <?php echo $Piececount;?>, <?php echo $marques;?>, <?php echo $familles;?>, <?php echo $imputations;?>]
        ]);

        // Set chart options
        var options = {'title':'Localisations et classifications','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div15'));
        chart.draw(data, options);
//17-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Actives');
        data.addColumn('number', 'Inactives');
        data.addColumn('number', 'Administrateurs');
        data.addColumn('number', 'Modérateurs');
        data.addColumn('number', 'Clients');
        data.addRows([
          ['Nombre', <?php echo $useractive;?>, <?php echo $userinactive;?>, <?php echo $useradmins;?>, <?php echo $useremployes;?>, <?php echo $userclients;?>]
        ]);

        // Set chart options
        var options = {'title':'Utilisateurs','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div16'));
        chart.draw(data, options);
//18-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Lu');
        data.addColumn('number', 'Non lu');
        data.addRows([
          ['Statut', <?php echo $demandelu;?>, <?php echo $demandenonlu;?>]
        ]);

        // Set chart options
        var options = {'title':'Demandes','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div17'));
        chart.draw(data, options);
//19-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Publiées');
        data.addColumn('number', 'En brouillons');
        data.addRows([
          ['Statut', <?php echo $servicepublier;?>, <?php echo $servicenonpublier;?>]
        ]);

        // Set chart options
        var options = {'title':'Services offerts','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div18'));
        chart.draw(data, options);
//20-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Publiées');
        data.addColumn('number', 'En brouillons');
        data.addRows([
          ['Statut', <?php echo $produitpublier;?>, <?php echo $produitnonpublier;?>]
        ]);

        // Set chart options
        var options = {'title':'Produits','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div19'));
        chart.draw(data, options);
//21-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Publiées');
        data.addColumn('number', 'En brouillons');
        data.addRows([
          ['Statut', <?php echo $pagepublier;?>, <?php echo $pagenonpublier;?>]
        ]);

        // Set chart options
        var options = {'title':'Pages','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div20'));
        chart.draw(data, options);

		
      }
    </script> 

<div style="width: 100%; background-color:#fff" align="center">
<div id="chart_div0" style="float:none;margin-left:5%" align="center"></div>
<div id="chart_div" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div1" style="float:left" align="center"></div>
<div id="chart_div2" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div3" style="float:left" align="center"></div>
<div id="chart_div4" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div5" style="float:left" align="center"></div>
<div id="chart_div6" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div7" style="float:left" align="center"></div>
<div id="chart_div8" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div9" style="float:left" align="center"></div>
<div id="chart_div10" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div11" style="float:left" align="center"></div>
<div id="chart_div12" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div13" style="float:left" align="center"></div>
<div id="chart_div14" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div15" style="float:left" align="center"></div>
<div id="chart_div16" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div17" style="float:left" align="center"></div>
<div id="chart_div18" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div19" style="float:left" align="center"></div>
<div id="chart_div20" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div21" style="float:left" align="center"></div><div style="clear:both;"></div>
</div>

</div>