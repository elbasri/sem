     <p align="center"><?php $this->Html->image('images/nos-réalisations-bouton.jpg', array('height'=>'100','width'=>'420'));?></p>
	 
	 <div id="banner-fade">


        <ul class="bjqs" style="color:#ffffff;font-size:16px;font-weight: ">
		 <!-- <li ><img src="img/images/slider.jpg" title="<a target='_blank' href='deals.php?id=<?php print '2'; ?>' class='buy-button index' >www.drupalstudy.com</a></font>"></li>
		  <li ><img src="img/images/slider1.jpg" title="<a target='_blank' href='deals.php?id=<?php print '2'; ?>' class='buy-button index' >www.offredealshotels.com</a></font>"></li>
		  <li ><img src="img/images/slider.jpg" title="<a target='_blank' href='deals.php?id=<?php print '2'; ?>' class='buy-button index' style=' ;margin:0px;padding:0px'>En Savoir Plus</a></font>"></li>
		  -->
		  <li>
		  <?php $this->Html->image('img/images/packpresence.png',array('title'=>'<a target=\'_blank\' href=\'link\' class=\'buy-button index\' >title</a></font>'));?>
		  </li>
        </ul>

      </div>
	  <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 500,
            width       : 960,
            responsive  : true
          });

        });
      </script>