<?php 
require './phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submit'])) {

	$from = $_POST['email'];
	$name = $_POST['author'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//echo $from;
	// echo "---";
	// echo $name;
	// echo "---";
	// echo $subject;
	// echo "---";
	// echo $message;

	$msgsubject = "Auto-Reply Thank You";
	$body = "Thank You for contacting. I will get back to you as soon as possible. <br> <br> Best Regards,<br> <b>Ranjit Desai</b> <br>
       Phd Student <br>
	 Rochester Institute of Technology,<br> Rochester, NY. <br> <a href=\"www.ranjit-desai.com\">www.ranjit-desai.com</a> <br>Message: ". $message . "<br>Email: " . $from;
	$plainbody = "Thank You for contacting, I will get back to you as soon as possible. Best Regards, Ranjit Desai 
	 Rochester Institute of Technology, Rochester, NY. www.ranjit-desai.com";
    $mymail = 'dranj24@gmail.com';
	//echo $body;
	sendmail($from, $name, $msgsubject, $body, $plainbody);

}

function sendmail($to, $name, $msgsubject, $body, $plainbody) {

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'dranj24@gmail.com';                 // SMTP username
	$mail->Password = 'Ravina24$GM';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('dranj24@gmail.com', 'Ranjit Desai');
	
	$mail->addAddress($to, $name);     // Add a recipient
	
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('dranj24@gmail.com', 'www.ranjit-desai.com');
	//$mail->addCC('aak24792@gmail.com');
	$mail->addBCC('dranj24@gmail.com');

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $msgsubject; //'Here is the subject';
	$mail->Body    = $body; //'This is the HTML message body <b>in bold!</b>';
	$mail->AltBody = $plainbody; //'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    // echo 'Message could not be sent.';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	    header("Location: index.html#contact");
        exit;
	} else {
	    // echo 'Message has been sent';
	    header("Location: index.html#contact");
	    exit;
	}

}
?>