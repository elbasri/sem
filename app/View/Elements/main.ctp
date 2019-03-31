
<?php 
//$sliders = $this->requestAction('Sliders/index/sort:created/direction:asc/limit:5');
		foreach($slide as $p) :?>
			
			<div style="clear:both;"></div>
<div id="tu">
				<h2><p><a href="<?php echo $p['Slider']['lien'];?>"  name="#how"><?php echo $p['Slider']['titre'];?></a></p></h2>
	<div id="banner" style="background:url(<?php echo $p['Slider']['fond'];?> ) no-repeat; background-size:100%">
                    <div id="bannerzi">
                       <ul>
                           <li class="banner1"><h3><?php echo $p['Slider']['titre'];?></h3></li>
                          <li class="banner2a"><h4><?php echo $p['Slider']['description'];?></h4></li>
                          
                          </ul>
                      </div>                      
                      <div class="bannerstar">
                     <?php echo $this->Html->image($p['Slider']['etoiles'], array('alt' => 'votrecodeur.com stars','title'=>'stars'));?>
                      <div class="winner"><?php echo $p['Slider']['phrase'];?></div>
						</div>	
                       <div class="bannerwin">
                        <a href='<?php echo $p['Slider']['lien'];?>'  class="bannerwin7"><?php echo $this->Html->image('images/ensavoirplus.png', array('alt' => 'votrecodeur.com','title'=>'khjkh','width'=>'150','height'=>'59'));?></a>
                        </div>   
			
                <div id="aniu">
                    	<a href="<?php echo $p['Slider']['telechargement'];?>" title=""><span>Télécharger Maintenant</span></a> 
				</div>
			</div>
			
		</div>
			<?php endforeach ; ?>
	