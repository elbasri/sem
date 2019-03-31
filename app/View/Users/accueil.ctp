<div align="center" class="affichage">
<br/>
<?php echo $this->Form->create('Stockaction'); ?>

    <?php echo $this->Form->input('nom',array('label' => 'Choisissez un type','options'=>array('1'=>'Journale par article','2'=>'Journale par récepteur','3'=>'Journale par fournisseur'),'onchange'=>'OnSelectionChange (this)','style'=>'width: 100%'));?>

    <div id="materiel">
	<?php echo $this->Form->input('materiel_id', array('label'=>'Choisissez un article','options' => $optionsmat,'style'=>'width: 100%'));?>
    </div>
    <div id="recepteur" style="display:none;width:100%">
	<?php echo $this->Form->input('client_id', array('label'=>'Choisissez un récepteur','options' => $optionsrec,'style'=>'width: 100%'));?>
    </div>
    <div id="fournisseur" style="display:none;width:100%">
	<?php echo $this->Form->input('fournisseur_id', array('label'=>'Choisissez un fournisseur','options' => $optionsfr,'style'=>'width: 100%'));?>
    </div>

<?php echo $this->Form->end('Afficher');?>
<script type="text/javascript">
	function OnSelectionChange (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="3"){
				document.getElementById('fournisseur').style.display="block";
				document.getElementById('recepteur').style.display="none";
				document.getElementById('materiel').style.display="none";
            }else if(selectedOption.value=="2") {
                                document.getElementById('fournisseur').style.display="none";
				document.getElementById('recepteur').style.display="block";
				document.getElementById('materiel').style.display="none";
            }else {
                                document.getElementById('fournisseur').style.display="none";
				document.getElementById('recepteur').style.display="none";
				document.getElementById('materiel').style.display="block";
			}
        }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
/*
if(count($entrees)>count($sorties)){
    $countop=count($entrees);
    $whatop=1;
}else{
    $countop=count($sorties);
    $whatop=2;
}
for ($i = 0; $i < $countop; ++$i) {
        if($whatop==2 and $countop<=count($entrees)){
            print_r ($entrees[$i]['Stockaction']['date']);
        }
    }
    */
//foreach($sum as $sum):
//endforeach; unset($sum);
$sge =$config['Configuration']['titre'];
$devise =$config['Configuration']['Devises'];

/*foreach($sorties as $post): 
        $phpdate = $post['Stockaction']['date'];
        $y= date( 'Y', strtotime(str_replace('-','/', $phpdate)) )."<br/>";
        $m= date( 'm', strtotime(str_replace('-','/', $phpdate)) )."<br/>";
        $d= date( 'd', strtotime(str_replace('-','/', $phpdate)) )."<br/>";
        $h= date( 'H', strtotime(str_replace('-','/', $phpdate)) )."<br/>";
        $i= date( 'i', strtotime(str_replace('-','/', $phpdate)) )."<br/>";
        $s= date( 's', strtotime(str_replace('-','/', $phpdate)) )."<br/>";
        //echo $phpdate;
        endforeach;*/
        
        
if(!$hygiene)$hygiene=0;
if(!$fbureau)$fbureau=0;
if(!$finformatique)$finformatique=0;
if(!$exploitation)$exploitation=0;
if(!$medicoTechnique)$medicoTechnique=0;
if(!$medicoHospitalier)$medicoHospitalier=0;
if(!$informatique)$informatique=0;
if(!$bureau)$bureau=0;
if(!$entree)$entree=0;
if(!$sortie)$sortie=0;
		  
?>
 <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
//0-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('datetime', 'Date');
        data.addColumn('number', 'Quantité');
        
        /*data.addColumn('date', 'date');
        data.addColumn('number', 'Quantité');
        data.addRows([
            <?php foreach($entrees as $post):
                    $phpdate = $post['Stockaction']['date'];
                    $y= date( 'Y', strtotime(str_replace('-','/', $phpdate)) );
                    $m= date( 'm', strtotime(str_replace('-','/', $phpdate)) );
                    $d= date( 'd', strtotime(str_replace('-','/', $phpdate)) );
                    $h= date( 'H', strtotime(str_replace('-','/', $phpdate)) );
                    $i= date( 'i', strtotime(str_replace('-','/', $phpdate)) );
                    $s= date( 's', strtotime(str_replace('-','/', $phpdate)) );
            ?>
                <?php //echo " [new Date(\"".$post['Stockaction']['date']."\".replace( /(\d{2})-(\d{2})-(\d{4})/, \"$2/$1/$3\")),".$post['Stockaction']['qte']."],";
                        echo " [new Date(".$y.", ".$m.", ".$d."),".$post['Stockaction']['qte']."],";
                ?>
            <?php endforeach; ?>
        ]);*/
        data.addRows([
        <?php 
                    $h=date( 'H');
                    $i= date( 'i');
                    $s= date( 's');
        foreach($entrees as $post):
                    $phpdate = $post['Stockaction']['date'];
                    $y= date( 'Y', strtotime(str_replace('-','/', $phpdate)) )-1;
                    $m= date( 'm', strtotime(str_replace('-','/', $phpdate)) )-1;
                    $d= date( 'd', strtotime(str_replace('-','/', $phpdate)) )-1;
                   
                   if($h<24)
                        $h=$h++;
                    else
                        $h=date( 'H');
                        
                    if($i<60)
                        $i=$i++;
                    else
                        $i= date( 'i');
                        
                    if($s<60)
                        $s=$s++;
                    else
                        $s= date( 's');
                        
                     
            ?> 
                [new Date(<?php echo $y.", ".$m.", ".$d; ?>), <?php echo $post['Stockaction']['qte'];?>],
                <?php endforeach; ?>
      ]);

        // Set chart options
        var options = {'title':'Journale des entrées','width':900,
                       'height':500,pointSize: 2,
          series: {
                0: { pointShape: 'circle' }
            }};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        var chart = new google.visualization.LineChart(document.getElementById('chart_div0'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div0'));
        chart.draw(data, options);
//0a-----
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('datetime', 'Date');
        data.addColumn('number', 'Quantité');
        
        data.addRows([
        <?php
                    $h=date( 'H');
                    $i= date( 'i');
                    $s= date( 's');
        foreach($sorties as $post):
                    $phpdate = $post['Stockaction']['date'];
                    $y= date( 'Y', strtotime(str_replace('-','/', $phpdate)) )-1;
                    $m= date( 'm', strtotime(str_replace('-','/', $phpdate)) )-1;
                    $d= date( 'd', strtotime(str_replace('-','/', $phpdate)) )-1;
                    if($h<24)
                        $h=$h++;
                    else
                        $h=date( 'H');
                        
                    if($i<60)
                        $i=$i++;
                    else
                        $i= date( 'i');
                        
                    if($s<60)
                        $s=$s++;
                    else
                        $s= date( 's');
            ?> 
                [new Date(<?php echo $y.", ".$m.", ".$d.", ".$h.", ".$i.", ".$s; ?>), <?php echo $post['Stockaction']['qte'];?>],
                <?php endforeach; ?>
      ]);

        // Set chart options
        var options = {'title':'Journale des sorties','width':900,
                       'height':500,pointSize: 2,
          series: {
                0: { pointShape: 'circle' }
            }};

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
          ['Matériel mobilier de bureau', <?php echo $bureau;?>],
          ['Matériel informatique', <?php echo $informatique;?>],
          ['Matériel medicoHospitalier', <?php echo $medicoHospitalier;?>],
          ['Matériel medicoTechnique', <?php echo $medicoTechnique;?>],
          ['Matériel d\'exploitation', <?php echo $exploitation;?>],
          ['Fourniture informatique', <?php echo $finformatique;?>],
          ['Fourniture de bureau', <?php echo $fbureau;?>],
          ['Produits d\'hygiène', <?php echo$hygiene ;?>],
        ]);
        // Set chart options
        var options = {'title':'Résumé du stock','width':450,
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
        var options = {'title':'Résumé du Journale','width':450,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_divx'));
        //var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
		
		
      }
    </script>
    

    
<div style="width: 100%; background-color:#fff" align="center">
<div id="chart_div0" style="float:left;" align="center"></div>
<div id="chart_div0a" style="float:left" align="center"></div>
<div id="chart_div" style="float:left;margin-left:5%" ></div>
<div id="chart_divx" style="float:right" ></div>
<div style="clear:both;"></div>
</div>

<table>
        <tr>
		<th>Libéllé</th>
		<th>Nombre</th>
		<th>Details</th>
        </tr> 
        
                <tr>
			<td><h2>L'inventaire</h2></td>
			<td class="strongs"><?php echo $inventairecount;?></td>
			<td>
				<table>
					<tr><td>Désignations (biens)</td><td class="strongs"><?php echo $inventairedesgcount;?></td></tr>
					<tr><td>Emplacements</td><td class="strongs"><?php echo $inventairedeplcount;?></td></tr>
				</table>
			</td>
		</tr>
</table>
<table>
        <tr>
		<th>Libéllé</th>
		<th>Nombre</th>
		<th>Details</th>
        </tr> 
        
                <tr>
			<td><h2>Articles du stock</h2></td>
			<td class="strongs"><?php echo $inventairecount;?></td>
			<td>
				<table>
					<tr><td>Matériel mobilier de bureau</td><td><font class="strongs"><?php echo $bureau;?></font> articles</td></tr>
					<tr><td>Matériel informatique</td><td><font class="strongs"><?php echo $informatique;?></font> articles</td></tr>
					<tr><td>Matériel medicoHospitalier</td><td><font class="strongs"><?php echo $medicoHospitalier;?></font> articles</td></tr>
					<tr><td>Matériel medicoTechnique</td><td><font class="strongs"><?php echo $medicoTechnique;?></font> articles</td></tr>
					<tr><td>Matériel d'exploitation</td><td><font class="strongs"><?php echo $exploitation;?></font> articles</td></tr>
					<tr><td>Fourniture informatique</td><td><font class="strongs"><?php echo $finformatique;?></font> articles</td></tr>
					<tr><td>Fourniture de bureau</td><td><font class="strongs"><?php echo $fbureau;?></font> articles</td></tr>
					<tr><td>Produits d'hygiène</td><td><font class="strongs"><?php echo $hygiene;?></font> articles</td></tr>
		
				</table>
			</td>
		</tr>
</table>
</div>
