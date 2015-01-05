<?php

$str = $_SESSION['user'] . ".php";
$smarty->assign("site",$str);
$smarty->display("home_link.tpl");
$smarty->display("banner.tpl");
$smarty->display("logout_link.tpl");

?>