<?php

  $start=$_SESSION['time_start']; 
       
        $ItemStartDate=$start."<br>";
        $ItemEndDate = $end."<br>";
        //    $Today = time();
        $TimeLeft = $ItemEndDate - $ItemStartDate;
        //$TimeLeft = $ItemEndDate - $ItemStartDate;
        if($TimeLeft > 0)
        {
        $ADayInSecs = 24 * 60 * 60;
        $Days = $TimeLeft / $ADayInSecs;
        $Days = intval($Days);
       
        $TimeLeft = $TimeLeft - ($Days * $ADayInSecs);
        $Hours = $TimeLeft / (60 * 60);
        $Hours = intval($Hours);
        $TimeLeft = $TimeLeft - ($Hours * 60 * 60);
       
        $Minutes = $TimeLeft / 60;
        $Minutes = intval($Minutes);
        $TimeLeft = $TimeLeft - ($Minutes * 60);
       
        $Seconds = $TimeLeft;
        $Seconds = intval($Seconds);
       
        $TimeLeft = $TimeLeft - ($Seconds / 60 * 60 );
        $MilliSeconds = $TimeLeft;
       
       
        }
?>