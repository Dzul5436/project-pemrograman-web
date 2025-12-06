<?php
$p=$_GET['p'] ?? 'dashboard';
switch($p){
    case 'dashboard':
        include "dashboard.php";
        break;
    case 'buat-event':
        include "buat-event.php";
        break;
    default:
        include "dashboard.php";
        break;
}
?>
