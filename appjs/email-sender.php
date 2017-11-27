<?php


if ($_POST) {
	
	$emailTo = $_POST['targetEmail'];
	//$emailTo = "mark.fisher.1995@gmail.com";
	
	$subject = $_POST['subject'];
	//$subject = "hello buddy";
	
	$body = $_POST['message'];
	//$body = "hi buddy";

	$headers = "From: ".$_POST['userEmail'];
	//$headers = "From: markxbox@msn.com";
	
	if(mail($emailTo, $subject, $body, $headers)) {
            $message = "success";
			echo json_encode($message);
    } else {
			$message = "failure";
			echo json_encode($message);
	};
}
?>