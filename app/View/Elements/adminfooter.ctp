    <div  id="foot">

		
		<div id="zuihou">
			<p></p>
			<ul>
            <br/>
			<?php if($this->Session->read('Auth.User.id') && $this->Session->read('Auth.User.role')!='client'){?>
			<div align="center"><strong ><a href="<?=$this->Html->url('/features')?>" style="font-size:20px;color:red">Administration</a></strong></div>
			<?php } ?>
			
				<!--<li>
				<?php
				/*if(isset($consultationfooter)){
				foreach($consultationfooter as $cn):
					echo $this->Html->link($cn['Consultation']['titre'],array('controller'=>'pages','action'=>'consultation',$cn['Consultation']['id'],Inflector::slug($cn['Consultation']['titre'],$remplacement = '_')),array('target'=>'_blanck')).'&nbsp;&nbsp';
				endforeach; unset ($cn);
				}*/
				?>
				</li>-->
			
				<li><i>&copy; Droit de copie 2014 votrecodeur.com ™</i></li>
				
				</ul>
			</div>
		</div>