<?php
$p=$_GET['p'] ?? 'dashboard';
switch ($p){
    case 'ev': include "user/events.php"; break;
    case 'det-ev': include "user/event-detail.php"; break;
    case 'cl': include "user/calendar.php"; break;
    case 'aj-ev': include "user/ajukan-event.php"; break;
    case 'dsh': include "user/dashboard.php"; break;
    case "blk": include "dashboard.php"; break;

    default: include "dashboard.php"; break;

}
