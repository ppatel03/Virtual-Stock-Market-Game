<?php
//log out /session time out after 5 minutes of idle time
session_destroy();
header("location:login.php");
?>