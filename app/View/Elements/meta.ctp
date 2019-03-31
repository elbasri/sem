<?php
$description=$titre;
$keywords=Inflector::slug($titre,$replacement =', ');
$this->assign( 'head_description', $description );
$this->assign( 'head_keywords', $keywords );

?>