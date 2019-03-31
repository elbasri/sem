<div class="affichage"> 
<?php
echo $this->Form->create('Stockaction');
echo $this->Form->input('materiel_id', array('label'=>'L\'article','options' => $options,'style'=>'width: 100%'));
?>
<table>
<?php
echo "<tr><td>".$this->Form->input('nom',array('label' => 'Type de l\'opération','options'=>array('entrée'=>'entrée','sortie'=>'sortie'),'onchange'=>'OnSelectionChange (this)'))."</td>";
?>
<td style="display:none" id="vers">
	<?php echo $this->Form->input('client_id', array('label'=>'Le récepteur','options' => $optionc,'style'=>'width: 100%'));?>
</td>
<td id="de">
	<?php echo $this->Form->input('fournisseur_id', array('label'=>'Le fournisseur','options' => $optionf,'style'=>'width: 100%'));?>
</td>
</tr>
<tr><td style="width:50%"><?php echo $this->Form->input('typevaleur', array('legend'=>'Type','required'=>'','type'=>'radio','options'=>array('1'=>'Quantité','2'=>'Volume','3'=>'Poids')));?></td>
	
	<td>
	<?php echo $this->Form->input('qte',array('label' => 'Valeur')); ?>
	</td>
</tr>
</table>

<?php
echo $this->Form->input('date',array('label' => 'Date'));
//echo $this->Form->input('raison',array('label' => 'Raison'));
echo $this->Form->end('Ajouter');
?>
<script type="text/javascript">
    function validate() {
        if (document.getElementById('destination').checked) {
            document.getElementById('vers').style.display="block";
        } else {
            document.getElementById('vers').style.display="none";
        }
    }
	function OnSelectionChange (select) {
            var selectedOption = select.options[select.selectedIndex];
            if(selectedOption.value=="sortie"){
				document.getElementById('vers').style.display="block";
				document.getElementById('de').style.display="none";
			}else {
                                document.getElementById('vers').style.display="none";
                                document.getElementById('de').style.display="block";
			}
        }
    </script>
</div>
