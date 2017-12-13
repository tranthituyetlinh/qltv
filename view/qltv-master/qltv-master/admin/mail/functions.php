<?php
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
	$nFrom = 'Freetuts.net';
	$mFrom = 'noreplytg24h@gmail.com';	//dia chi email cua ban 
	$mPass = 'tg24h123123';		//mat khau email cua ban
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = 465;
	$mail->Username   = $mFrom;  // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
	$nFrom = 'Freetuts.net';
	$mFrom = 'xxxx@gmail.com';	//dia chi email cua ban 
	$mPass = 'passlamatkhua';		//mat khau email cua ban
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = 465;
	$mail->Username   = $mFrom;  // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
	$mail->AddAttachment($file,$filename);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

?>