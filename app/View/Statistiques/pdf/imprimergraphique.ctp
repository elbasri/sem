 <div align="center">

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
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
//1-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Monsieurs', <?php echo $employemr;?>],
          ['Madames', <?php echo $employemme;?>],
          ['Demoiselles', <?php echo $employemlle;?>],
        ]);

        // Set chart options
        var options = {'title':'Employes par sexe','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
//2-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['mauvais', <?php echo $employemv;?>],
          ['moyenne', <?php echo $employemy;?>],
          ['bien', <?php echo $employebn;?>],
          ['excellent', <?php echo $employeex;?>],
        ]);

        // Set chart options
        var options = {'title':'Employes par notes','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
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
        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
//4-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Encours', <?php echo $tacheencours;?>],
          ['Terminés', <?php echo $tacheterminer;?>],
        ]);

        // Set chart options
        var options = {'title':'Statut de Tâches','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
//5-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Encours', <?php echo $vacanceencours;?>],
          ['Terminés', <?php echo $vacanceterminer;?>],
        ]);

        // Set chart options
        var options = {'title':'Statut de Congés','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
//6-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Spécialités', <?php echo $Specialitecount;?>],
          ['Primes', <?php echo $Primecount;?>],
        ]);

        // Set chart options
        var options = {'title':'Autres (Ressources humaines)','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div5'));
        chart.draw(data, options);
//7-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Expirés', <?php echo $matrerielex;?>],
          ['Conservés', <?php echo $matrerielcon;?>],
        ]);

        // Set chart options
        var options = {'title':'Statut de consérvation d\'articles','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div6'));
        chart.draw(data, options);
//8-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['entrées', <?php echo $entree;?>],
          ['sorties', <?php echo $sortie;?>],
        ]);

        // Set chart options
        var options = {'title':'Journale du stock','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div7'));
        chart.draw(data, options);
//9-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Avec Contrat de Garantie', <?php echo $invcontratg;?>],
          ['Avec Contrat de Maintenance', <?php echo $invcontratm;?>],
          ['Avec Contrat d\'Assurance', <?php echo $invcontrata;?>],
          ['Avec Contrat de Location', <?php echo $invcontratl;?>],
        ]);

        // Set chart options
        var options = {'title':'L\'inventaire','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div8'));
        chart.draw(data, options);
//10-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Clients', <?php echo $clients;?>],
          ['Fournisseurs', <?php echo $fournisseurs;?>],
          ['Fabricants', <?php echo $fabricants;?>],
          ['S.Maintenance', <?php echo $smaintenance;?>],
          ['S.Assurance', <?php echo $sassurance;?>],
          ['S.Location', <?php echo $slocation;?>],
        ]);

        // Set chart options
        var options = {'title':'CRM/Contacts','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div9'));
        chart.draw(data, options);
//11-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Terminés', <?php echo $projetterminer;?>],
          ['Encours', <?php echo $projetencours;?>],
          ['A venir', <?php echo $projetavenir;?>],
          ['Réalisations', <?php echo $Realisationcount;?>],
        ]);

        // Set chart options
        var options = {'title':'Projets','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div10'));
        chart.draw(data, options);
//12-a-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Expirés', <?php echo $contratt;?>],
          ['Valides', <?php echo $contrate;?>],
        ]);

        // Set chart options
        var options = {'title':'Statut de Contrats','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div11a'));
        chart.draw(data, options);
//12-b-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Garantie', <?php echo $contratg;?>],
          ['Maintenance', <?php echo $contratm;?>],
          ['Assurance', <?php echo $contrata;?>],
          ['Location', <?php echo $contratl;?>],
        ]);

        // Set chart options
        var options = {'title':'Type de Contrats','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div11b'));
        chart.draw(data, options);
//13-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Sans réponse', <?php echo $devissans;?>],
          ['Accepté', <?php echo $devisaccepte;?>],
          ['Refusé', <?php echo $devisref;?>],
        ]);

        // Set chart options
        var options = {'title':'Devis','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div12'));
        chart.draw(data, options);
//14-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Réglée', <?php echo $facturereg;?>],
          ['Non réglée', <?php echo $facturenonreg;?>],
        ]);

        // Set chart options
        var options = {'title':'Factures','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div13'));
        chart.draw(data, options);
//14-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['A envoyer', <?php echo $commandeae;?>],
          ['Arrivage', <?php echo $commandear;?>],
        ]);

        // Set chart options
        var options = {'title':'Commandes','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div13'));
        chart.draw(data, options);
//15-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Recettes', <?php echo $comptarec;?>],
          ['Dépenses', <?php echo $comptadep;?>],
        ]);

        // Set chart options
        var options = {'title':'Comptabilité','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div14'));
        chart.draw(data, options);
//16-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Localisations', <?php echo $Piececount;?>],
          ['Marques', <?php echo $marques;?>],
          ['Familles', <?php echo $familles;?>],
          ['Imputations', <?php echo $imputations;?>],
        ]);

        // Set chart options
        var options = {'title':'Localisations et classifications','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div15'));
        chart.draw(data, options);
//17-a-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Actives', <?php echo $useractive;?>],
          ['Inactives', <?php echo $userinactive;?>],
        ]);

        // Set chart options
        var options = {'title':'Statut d\'utilisateurs','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div16a'));
        chart.draw(data, options);
//17-b-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Administrateurs', <?php echo $useradmins;?>],
          ['Modérateurs', <?php echo $useremployes;?>],
          ['Clients', <?php echo $userclients;?>],
        ]);

        // Set chart options
        var options = {'title':'Type d\'utilisateurs','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div16b'));
        chart.draw(data, options);
//18-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Lu', <?php echo $demandelu;?>],
          ['Non lu', <?php echo $demandenonlu;?>],
        ]);

        // Set chart options
        var options = {'title':'Demandes','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div17'));
        chart.draw(data, options);
//19-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Publiées', <?php echo $servicepublier;?>],
          ['En brouillons', <?php echo $servicenonpublier;?>],
        ]);

        // Set chart options
        var options = {'title':'Services offerts','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div18'));
        chart.draw(data, options);
//20-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Publiées', <?php echo $produitpublier;?>],
          ['En brouillons', <?php echo $produitnonpublier;?>],
        ]);

        // Set chart options
        var options = {'title':'Produits','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div19'));
        chart.draw(data, options);
//21-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Nombre');
        data.addRows([
          ['Publiées', <?php echo $pagepublier;?>],
          ['En brouillons', <?php echo $pagenonpublier;?>],
        ]);

        // Set chart options
        var options = {'title':'Pages','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.PieChart(document.getElementById('chart_div20'));
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
<div id="chart_div15" style="float:left" align="center"></div>
<div id="chart_div11b" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div11a" style="float:left" align="center"></div>
<div id="chart_div12" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div13" style="float:left" align="center"></div>
<div id="chart_div14" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div16" style="float:left" align="center"></div><div style="clear:both;"></div>
<div id="chart_div16a" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div16b" style="float:left" align="center"></div>
<div id="chart_div17" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div18" style="float:left" align="center"></div>
<div id="chart_div19" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div22" style="float:left" align="center"></div>
<div id="chart_div21" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div20" style="float:left" align="center"></div>
<div style="clear:both;"></div>
</div>
<?php echo "<script>window.print();</script>";?>
</div>
