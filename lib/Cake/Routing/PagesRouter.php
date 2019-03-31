<?php
class MyCustomRoute extends CakeRoute {
function parse($url) {
    $params = parent::parse($url);
    //import your model
    App::import('Model','Page');
    //create model object
    $Page = new Page();
    //find using $params['page'];
    if($Page->find('first', array('conditions'=>array('page.slug'=>$params['page'])))){
         //return $params if successfull match 
       return $params
    } else 
       return false;
    //return false to fall through to next route.
}
}
?>