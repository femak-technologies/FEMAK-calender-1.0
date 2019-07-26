<?php

$todaydate=getdate();
define('today', $todaydate);
//get the today info
$wday=today['wday'];
$today_day=today['mday'];
$month=today['month'];
$mon=today['mon'];
$year=today['year'];
$mday=today['mday'];

//get the start of the month
$mstart=strtotime("1 ".$month." ".$year);
define('mstart', getdate($mstart));
//count the number of days in the month
$offset=mstart['wday'];
$mon_days=0;

for($counts=1; $counts < 32 ; ++$counts){
	$bng=checkdate($mon,$counts,$year);
	//$check_day = getdate($bng);
	if($bng!=false){
	$mon_days+=1;
		
		
	}
	
}
//get total cell to render
$total_cell = $mon_days + $offset;





?>


<div id="my-calendar" class="my-calendar">
    <div id="calendar-header" class="calendar-header">
        <div class="float-left control"><i class="fa fa-chevron-left"></i></div>
        <div class="float-right control"><i class="fa fa-chevron-right"></i></div>
        <h1 class="text-center d-block" style="font-family:&#39;Bree Serif&#39;, serif;"><?php echo $month.", ". $year;?></h1>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
			 <tr>
			 
                    <th>S</th>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                </tr>
            </thead>
			 <tbody id="my-calendar-body" class="my-calendar-body">
                <tr>
			<?php
			//start rendering the calendar

for($cell=1; $cell<= $total_cell; ++$cell){
	$cell_no = $cell - $offset;
	if($cell_no <=0){
		echo "<td class=\"disabled\"></td>";
	}
	else{
		//$cell_n=$cell_no +1;
		$active_day= $cell_no==$mday?"class=\"active\"":"";
echo "<td ".$active_day.">".$cell_no."</td>";	
	
	if($cell % 7==0){
		echo "</tr><tr>";
	}
	}
}			
			?>
               
                </tr>
                
            </tbody>
        </table>
    </div>
</div>