<div class="affichage">


<?php if(isset($bureau) && $bureau){ ?>
<h2>Matériel Mobilier de bureau</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($bureau as $post): 
            ?>
            <tr>
            
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($informatique) && $informatique){ ?>
<h2>Matériel informatique</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($informatique as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($medicoHospitalier) && $medicoHospitalier){ ?>
<h2>Matériel medicoHospitalier</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($medicoHospitalier as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($medicoTechnique) && $medicoTechnique){ ?>
<h2>Matériel medicoTechnique</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($medicoTechnique as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            
            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($exploitation) && $exploitation){ ?>
<h2>Matériel d'exploitation</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($exploitation as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($fbureau) && $fbureau){ ?>
<h2>Fourniture de bureau</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($fbureau as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
           

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($finformatique) && $finformatique){ ?>
<h2>Fourniture informatique</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($finformatique as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php } if(isset($hygiene) && $hygiene){ ?>
<h2>Produits d'hygiène</h2>
<table >
<tr>
<th>Inventaire</th>
<th>Désignation</th>
<th>QTE</th>
</tr>
            <?php foreach($hygiene as $post): 
            ?>
            <tr>
            <td ><?php echo $post['Materiel']['ref'];?></td>
            <td ><?php echo $this->Html->link($post['Materiel']['nom'],array('controller'=>'materiels','action'=>'view',$post['Materiel']['id'],Inflector::slug($post['Materiel']['nom'],$replacement ='_')));?></td>
            <td ><?php echo $post['Materiel']['qte'];?></td>
            

            </tr>
            <?php
            endforeach; unset($post);?>
</table>
<?php }?>


<?php echo "<script>window.print();</script>"; ?>	
</div>
