<div align="center">

<?php 

//foreach($sum as $sum):
//endforeach; unset($sum);
$sge =$config['Configuration']['titre'];
$devise =$config['Configuration']['Devises'];

if(!$depensesum)$depensesum=0;
if(!$recettesum)$recettesum=0;
if(!$stocksum)$stocksum=0;
if(!$bienssum)$bienssum=0;
if(!$congessum)$congessum=0;
if(!$saliressum)$saliressum=0;
if(!$primessum)$primessum=0;
if(!$paiessum)$paiessum=0;
if(!$saisirsum)$saisirsum=0;
if(!$kilosum)$kilosum=0;
if(!$deplasum)$deplasum=0;
if(!$entree)$entree=0;
if(!$sortie)$sortie=0;
if(!$tacheterminer)$tacheterminer=0;
if(!$tacheavenir)$tacheavenir=0;
if(!$tacheencours)$tacheencours=0;
if(!$matrerielex)$matrerielex=0;
if(!$matrerielcon)$matrerielcon=0;
		  
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
        data.addColumn('date', 'date');
        data.addColumn('number', 'Total');
        data.addColumn('number', 'TVA perçue');
        data.addRows([
		<?php foreach($Recettes as $post):?>
         <?php echo " [new Date(\"".$post['Recette']['date']."\".replace( /(\d{2})-(\d{2})-(\d{4})/, \"$2/$1/$3\")),".$post['Recette']['total'].",".$post['Recette']['tva']."],";?>
		 <?php endforeach; unset($Recettes);?>
        ]);

        // Set chart options
        var options = {'title':'Recettes en <?php echo $devise;?>','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.LineChart(document.getElementById('chart_div0'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div0'));
        chart.draw(data, options);
//0a-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'date');
        data.addColumn('number', 'Payée (TTC)');
        data.addColumn('number', 'TVA payée');
        data.addRows([
		<?php foreach($Depenses as $post):?>
         <?php echo " [new Date(\"".$post['Depense']['date']."\".replace( /(\d{2})-(\d{2})-(\d{4})/, \"$2/$1/$3\")),".$post['Depense']['payee'].",".$post['Depense']['tva']."],";?>
		 <?php endforeach; unset($Depenses);?>
        ]);

        // Set chart options
        var options = {'title':'Dépenses en <?php echo $devise;?>','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.LineChart(document.getElementById('chart_div0a'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div0'));
        chart.draw(data, options);
//1-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Numéro');
        data.addRows([
          ['Dépenses en <?php echo $devise;?>', <?php echo $depensesum;?>],
          ['Recettes en <?php echo $devise;?>', <?php echo $recettesum;?>],
          ['Taux du stock en <?php echo $devise;?>', <?php echo $stocksum;?>],
          ['Taux des Biens en <?php echo $devise;?>', <?php echo $bienssum;?>],
          ['Taux des Congés en <?php echo $devise;?>', <?php echo $congessum;?>],
          ['Taux des Salaires en <?php echo $devise;?>', <?php echo $saliressum;?>],
          ['Taux de Primes en <?php echo $devise;?>', <?php echo $primessum;?>],
          ['Taux de Paies en <?php echo $devise;?>', <?php echo $paiessum;?>],
          ['Taux de Saisies débit/crédit en <?php echo $devise;?>', <?php echo $saisirsum;?>],
          ['Taux de Kilométrages en <?php echo $devise;?>', <?php echo $kilosum;?>],
          ['Taux de Déplacements <?php echo $devise;?>', <?php echo $deplasum;?>],
        ]);

        // Set chart options
        var options = {'title':'Comptes financiers','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
//2-----
		// Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Numéro');
        data.addRows([
          ['Antrées', <?php echo $entree;?>],
          ['Sorties', <?php echo $sortie;?>]
        ]);

        // Set chart options
        var options = {'title':'Journale du stock','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_divx'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		
		
//3------

		 // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Numéro');
       data.addRows([
          ['Tâches Términés', <?php echo $tacheterminer;?>],
          ['Tâches encours', <?php echo $tacheencours;?>],
          ['Tâches à venir', <?php echo $tacheavenir;?>]
        ]);

        // Set chart options
        var options = {'title':'Statut de Tâches','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_divy'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
				
//4------

		 // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Numéro');
        data.addRows([
          ['Articles expirés', <?php echo $matrerielex;?>],
          ['Articles non expirés', <?php echo $matrerielcon;?>]
        ]);

        // Set chart options
        var options = {'title':'Statut d\'articles du stock','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_divz'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		
		
      }
    </script> 
<div style="width: 100%; background-color:#fff" align="center">
<div id="chart_div0" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_div0a" style="float:left" align="center"></div>
<div id="chart_div" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_divx" style="float:left" align="center"></div>
<div id="chart_divy" style="float:left;margin-left:5%" align="center"></div>
<div id="chart_divz" style="float:left" align="center"></div>
<div style="clear:both;"></div>
</div>
<div class="affichage" style="width: 100%;"> 
<?php  if(isset($cinex) && $cinex){?>
<h1>Les CIN expirés <a href="<?=$this->Html->url('/employes/cin')?>" ><font size="3">(La liste complète)</font></a></h1>
	<table>
		<tr> 
		<th>Nom</th>
		<th>Prénom</th>
		<th>Spécialité</th>
		<th>Date d'expiration de CIN</th>
		<th>Action</th>
		</tr>
		<?php foreach($cinex as $user):?>
		<tr>
		<td><?php echo $this->Html->link($user['Employe']['nom'],array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$remplacement='_')));?></td>
		<td><?php echo $user['Employe']['prenom'];?></td>
		<td><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></td>
		<td><?php echo $user['Employe']['cinend'];?></td>
		<td>
		<?php echo $this->Html->link('Afficher l\'employe',array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$replacement ='_')));?>
		</td>
		</tr>
		<?php endforeach; unset($cinex);?>
	</table>
<?php } ?>
</div>
<div class="affichage" style="width: 100%;">  
<?php if(isset($congesex) && $congesex){?>
<h1>Les Congés Terminés <a href="<?=$this->Html->url('/vacances/t')?>" ><font size="3">(La liste complète)</font></a></h1>
	<table>
		<tr> 
		<th>Raison de congés</th>
		<th>Type de congés</th>
		<th>L'employe</th>
		<th>Action</th>
		</tr>
		<?php foreach($congesex as $post):?>
		<tr>
		<td><?php echo $this->Html->link($post['Vacance']['nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['id'],Inflector::slug($post['Vacance']['nom'],$replacement ='_')));?></td>
		<td><?php echo $post['Vacance']['type'];?></td>
		<td><?php echo $this->Html->link($post['Vacance']['employe_nom'],array('controller'=>'vacances','action'=>'view',$post['Vacance']['employe_id'],Inflector::slug($post['Vacance']['employe_nom'],$replacement ='_')));?></td>
		<td><?php echo $this->Html->link('Afficher les détails',array('controller'=>'vacances','action'=>'view',$post['Vacance']['id'],Inflector::slug($post['Vacance']['nom'],$remplacement='_')));?></td>
		</tr>
		<?php endforeach; unset($congesex);?>
	</table>
<?php } ?>
</div>
<div class="affichage" style="width: 100%;">  
<?php if(isset($contratex) && $contratex){?>
<h1>Les Contrats du travail expirés <a href="<?=$this->Html->url('/employes/cin')?>" ><font size="3">(La liste complète)</font></a></h1>
	<table>
		<tr> 
		<th>Nom</th>
		<th>Prénom</th>
		<th>Spécialité</th>
		<th>Date d'expiration</th>
		<th>Action</th>
		</tr>
		<?php foreach($contratex as $user):?>
		<tr>
		<td><?php echo $this->Html->link($user['Employe']['nom'],array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$remplacement='_')));?></td>
		<td><?php echo $user['Employe']['prenom'];?></td>
		<td><?php echo $this->Html->link($user['Employe']['specialite'],array('controller'=>'specialites','action'=>'view',$user['Employe']['specialite_id'],Inflector::slug($user['Employe']['specialite'],$remplacement='_')));?></td>
		<td><?php echo $user['Employe']['datefintravail'];?></td>
		<td>
		<?php echo $this->Html->link('Afficher l\'employe',array('controller'=>'employes','action'=>'view',$user['Employe']['id'],Inflector::slug($user['Employe']['nom'],$replacement ='_')));?>
		</td>
		</tr>
		<?php endforeach; unset($contratex);?>
	</table>
<?php } ?>
</div>
<div class="affichage" style="width: 100%;">  
<?php if(isset($contratsex) && $contratsex){?>
<h1>Les Contrats expirés <font size="4">(CRM)</font> <a href="<?=$this->Html->url('/contrats/cin')?>" ><font size="3">(La liste complète)</font></a></h1>
	<table>
		<tr> 
		<th>Libellé</th>
		<th>Type</th>
		<th>Date d'expiration</th>
		<th>La société</th>
		<th>Action</th>
		</tr>
		<?php foreach($contratsex as $post):?>
		<tr>
		<td><?php echo $this->Html->link($post['Contrat']['nom'],array('controller'=>'Contrats','action'=>'view',$post['Contrat']['id'],Inflector::slug($post['Contrat']['nom'],$replacement ='_')));?></td>
		<td><?php echo $post['Contrat']['type'];?></td>
		<td><?php echo $post['Contrat']['datef'];?></td>
		<td><?php echo $this->Html->link($post['Contrat']['client_nom'],array('controller'=>'clients','action'=>'view',$post['Contrat']['client_id'],Inflector::slug($post['Contrat']['client_nom'],$replacement ='_')));?></td>
		<td><?php echo $this->Html->link('Afficher l\'article',array('controller'=>'contrats','action'=>'view',$post['Contrat']['id'],Inflector::slug($post['Contrat']['nom'],$remplacement='_')));?></td>
		</tr>
		<?php endforeach; unset($contratsex);?>
	</table>
<?php } ?>
</div>
<div class="affichage" style="width: 100%;">  
<?php if(isset($articlesex) && $articlesex){?>
<h1>Les Articles expirés <font size="4">(Durée de conservation dépassé)</font> <a href="<?=$this->Html->url('/materiels/t')?>" ><font size="3">(La liste complète)</font></a></h1>
	<table>
		<tr> 
		<th>Référence</th>
		<th>Libellé</th>
		<th>Magasin</th>
		<th>Durée de conservation</th>
		<th>Fournisseur</th>
		<th>Action</th>
		</tr>
		<?php foreach($articlesex as $post):?>
		<tr>
		<td><?php echo $post['Materiel']['ref'];?></td>
		<td><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
		<td><?php echo $this->Html->link($post['Materiel']['piece_nom'],array('controller'=>'pieces','action'=>'view',$post['Materiel']['piece_id'],Inflector::slug($post['Materiel']['piece_nom'],$remplacement='_')));?></td>
		<td><?php echo "de ".$post['Materiel']['dated']." Jusqu'à ".$post['Materiel']['datef'];?></td>
		<td><?php echo $this->Html->link($post['Materiel']['fournisseur_nom'],array('controller'=>'clients','action'=>'view',$post['Materiel']['fournisseur_id'],Inflector::slug($post['Materiel']['fournisseur_nom'],$remplacement='_')));?></td>
		<td><?php echo $this->Html->link('Afficher l\'article',array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$remplacement='_')));?></td>
		</tr>
		<?php endforeach; unset($articlesex);?>
	</table>
<?php } ?>
</div>
<div class="affichage" style="width: 100%;">  
<?php if(isset($users) && $users){?>
<h1>Nouveaux Utilisateurs enregistrés</h1>
	<table>
		<tr> 
		<th>Pseudo</th>
		<th>Nom</th> 
		<th>Role</th>
		<th>Etat</th> 
		<th>Action</th>
		</tr>
		<?php foreach($users as $user):?>
		<tr>
		<td><?php echo $user['User']['username'];?></td>
		<td><?php echo $user['User']['nom'];?></td>
		<td><?php 
		if($user['User']['id']==1)
			echo '<font color=\'red\'>Super Admin</font>';
		else if($user['User']['role']=='admin')
			echo '<font color=\'red\'>'.$user['User']['role'].'</font>';
		else if($user['User']['role']=='moderateur')
			echo '<font color=\'#0000FF\'>'.$user['User']['role'].'</font>';
		else
			echo '<font color=\'green\'>'.$user['User']['role'].'</font>';
		?></td>
		<td><?php 
		if($user['User']['etat']==0)
			echo '<p style=\'color:red\'>Innactive</p>';
		else
			echo '<p style=\'color:green\'>Active</p>';
		?></td>
		 
		<td><?php echo $this->Html->link('Afficher le Profile',array('controller'=>'users','action'=>'view',$user['User']['id'],Inflector::slug($user['User']['username'],$remplacement='_')));?></td>
		</tr>
		<?php endforeach; unset($users);?>
	</table>
<?php } ?>
</div>
<div class="affichage" style="width: 100%;">  
<?php if(isset($demandes) && $demandes){?>
<h1>Nouvelles Demandes</h1>
	<table >
		<tr>
		<th>Numéro</th>
		<th>Titre de demande</th>
		<th>Par</th>
		<th>Date</th>
		<th>Action</th>
		</tr>
		<?php foreach($demandes as $post): 
		if($post['Demande']['etat']==0)
			echo '<tr><td style=\'background:red;color:#fff\'>';
		else
			echo '<tr><td>';
		?>
		<?php echo $post['Demande']['id'];?></td>
		<td><?php echo $post['Demande']['titre'];?></td>
		<td><?php echo $post['Demande']['nom'];?></td> 
		<td><?php echo $post['Demande']['created'];?></td>
		<td><?php echo $this->Html->link('Afficher le Demande',array('controller'=>'demandes','action'=>'view',$post['Demande']['id'],Inflector::slug($post['Demande']['nom'],$replacement ='_')));?></td>
		<tr>
		<?php endforeach; unset($post);?>
	</table>
<?php } ?>
</div>
</div>