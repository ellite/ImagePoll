<?php
	if(isset($_POST['option']) && isset($_POST['email'])) {
		$option = $_POST['option'];
		$email = $_POST['email'];
		include('../includes/connect.php');
		//Check if this combination ID + Choice exists (invalid case);
		$query = 'SELECT COUNT(*) FROM logo WHERE voteoption = "'.$option.'" AND email = "'.$email.'"';
		$result = mysql_query($query);
		$numb = mysql_result($result,0);
		if($numb > 0) {
			echo "Already voted on this Logo"; die();
		}
		//Check if this email has voted 3 times (invalid case);
		$query = 'SELECT COUNT(*) FROM logo WHERE email = "'.$email.'"';
		$result = mysql_query($query);
		$numb = mysql_result($result,0);
		if($numb > 2) {
			echo "Max votes reached"; die();
		}
		//Insert on BD
		$query = 'INSERT INTO logo SET voteoption = '.$option.', email = "'.$email.'"';
		if(mysql_query($query)) {
			echo "Voted";
		} else {
			echo "Error";	
		}
	} else {
		echo "No image selected";
	}
?>