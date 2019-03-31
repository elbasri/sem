<?php
session_name('CAKEPHP');
session_start();
echo $_SESSION['Auth']['User']['usernamex']."<br>";
echo $_SESSION['Auth']['User']['idx'];

?>