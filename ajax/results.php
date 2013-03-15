<?php
	include('../includes/connect.php');
	$query = "SELECT * FROM logo";
	$result = mysql_query($query);
	$option = array(0,0,0,0,0,0,0);
	while($row = mysql_fetch_array($result)) {
		$option[$row['voteoption']]++;	
	}
	$totalVotes = $option[1] + $option[2] + $option[3] + $option[4] + $option[5] + $option[6];
	$percent = array(0,0,0,0,0,0,0);
	$string = "";
	for($i = 1; $i <= 6; $i++) {
		if($totalVotes > 0) {
			$percent[$i] = round(($option[$i] * 100) / $totalVotes);
		} else {
			$percent[$i] = 0;
		}
		$string .= ''.$i.', '.$percent[$i].'%*DELIMITER*';
	}
	echo $string;
	
?>