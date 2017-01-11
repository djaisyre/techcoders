<?php
include('PHPMailer-master/class.phpmailer.php');
include("PHPMailer-master/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
include 'connection.php';

$mail = new PHPMailer;

$locIdd = $_GET['locIdd'];
$appPerJob = 'SELECT * FROM tbl_application a, tbl_applicant b, tbl_jobpost c WHERE a.application_status = 3 AND a.applicant_id = b.applicant_id AND a.jobpost_id = c.jobpost_id AND c.locators_id = :locators_id';
$appPerJobStmt = $dbh->prepare($appPerJob);
$appPerJobStmt->bindParam(':locators_id', $locIdd, PDO::PARAM_INT);
$appPerJobStmt->execute();
$appPerJobStmtResult = $appPerJobStmt->fetchAll(PDO::FETCH_ASSOC);

foreach($appPerJobStmtResult as $appInfo) {

	//$body             = file_get_contents('contents.html');
	//$body             = eregi_replace("[\]",'',$body);	
	
	$body             = "You are scheduled for an interview";

	$mail             = new PHPMailer();
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.gmail.com"; 		// SMTP server
	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "lecharmehotels@gmail.com";  // GMAIL username
	$mail->Password   = "lecharmeadmin@12345";            // GMAIL password
	$mail->SetFrom('name@yourdomain.com', 'First Last');
	$mail->AddReplyTo("name@yourdomain.com","First Last");
	$mail->Subject    = "Application Interview";
	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML($body);

	$address = $appInfo["applicant_email"];
	$mail->AddAddress($address, "John Doe");

	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
	  echo "Mailer Error: ".$mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}	
}
?>