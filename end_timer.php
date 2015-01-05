<?php

$Seconds." Seconds " ;
$time_out=5;//session time out after 30 seconds of idle time
if($Minutes<$time_out){
    $_SESSION['time_start']=$end;
}else{
    include("logout.php");
}
?>