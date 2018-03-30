<link rel="stylesheet" href="calendar/calendar.css">
<?php
    $monthNames = Array("January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December");
?>

<?php
    if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
    if (!isset($_REQUEST["year"]))  $_REQUEST["year"] = date("Y");
?>

<?php
    $cMonth = $_REQUEST["month"];
    $cYear = $_REQUEST["year"];
    $prev_year = $cYear;
    $next_year = $cYear;
    $prev_month = $cMonth-1;
    $next_month = $cMonth+1;

    if ($prev_month == 0 ) {
        $prev_month = 12;
        $prev_year = $cYear - 1;
    }
    if ($next_month == 13 ) {
        $next_month = 1;
        $next_year = $cYear + 1;
    }
?>


<?php
    $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
    $maxday    = date("t",$timestamp);
    $thismonth = getdate ($timestamp);
    $startday  = $thismonth['wday'];
?>


<body>


<div class="month">
  <ul>
    <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year . "&id=".$id; ?>"><li class="prev">&#10094;</li></a>
    <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year . "&id=".$id; ?>"><li class="next">&#10095;</li></a>
    <li style="text-align:center">
      <?php echo $monthNames[$cMonth-1]; ?><br>
      <span style="font-size:18px"><?php echo $cYear; ?></span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li class="w3-red">Sun</li>
  <li>Mon</li>
  <li>Tue</li>
  <li>Wed</li>
  <li>Thu</li>
  <li>Fri</li>
  <li>Sat</li>
</ul>

<ul class="days">

  <?php
          $cek=0;
        for ($i=0; $i<($maxday+$startday); $i++) {
          $cek = ($i - $startday + 1);
          if($cek <= 0) { ?>
            <li class="jalang"></li>
          <?php }
         else {  $chek = 0;
                ?>
            <li style="font-size:14px;" class="w3-blue jalang"><?php echo $cek; ?></li>
        
          <?php     }
          }
      
   ?>

</ul>

<div class="w3-blue w3-card-4 w3-container w3-padding">
  <h4>Event This Month</h4>
</div>

</body>