<?php 
	include_once("../config/config.php");
	function matkhau() {
	    $bangchucai = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $matkhauduoctao = array();
	    $chieudaimang = strlen($bangchucai) - 1;
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $chieudaimang);
	        $matkhauduoctao[] = $bangchucai[$n];
	    }
	    return implode($matkhauduoctao); //turn the array into a string
	}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		
		if (!($ketnoi->tontai("SELECT * FROM nhanvien WHERE Mail = N'".$_POST['omail']."' AND TrangThaiNV = '0' AND DaXoa = '0'"))) { ?>
		<script type="text/javascript">alert("Không tìm thấy mail trong hệ thống!")</script>	
		<?php exit();}
		$mk = matkhau();
		$mk_md5 = md5($mk);
		$hoi = "
			UPDATE `nhanvien` SET `MatKhau` = '$mk_md5' WHERE `nhanvien`.`Mail` = '".$_POST['omail']."'
		";
		if (mysqli_query($conn,$hoi)) {
			include_once ("../mail/class.phpmailer.php");  
			include_once ("../mail/class.smtp.php");    
			$dc = $_POST['omail'];
			$mail = new PHPMailer();  
			$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
			$mail->CharSet = "UTF-8";
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'vlutelibktv@gmail.com';                 // SMTP username
			$mail->Password = 'vlutelibktv@2017';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('vlutelibktv@gmail.com', 'VLUTE_LIB');
			$mail->addAddress($dc);     // Add a recipient
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'VLUTE_LIB';
			$mail->Body    = '
			<table style="max-width:555px;background-color:#eff3f2;border-style:none;margin:0 auto;height:255px;">
				<tbody>
					<tr>
						<th colspan="2" style="height: 20px;font-size: 24px;background:#009085;color:#fff;text-align:inherit;border-left: 9px solid #23746e;padding-left: 10px;">RESET MẬT KHẨU</th>
					</tr>
					<tr style="font-size: 20px;height: 20px;">
						<td style="width: 300px;font-weight: bold;padding: 0;">Mật khẩu mới của bạn sẽ là: </td>
						<td style="
			    padding: 0;
			">'.$mk.'</td>
					</tr>
					<tr>
						<td colspan="2" style="background-color:bisque;height: 20px;text-align:end;padding-right:15px;border-right:9px solid #c6955b;"><b><i>Gửi từ | Thư viện</i></b></td>
					</tr>
				</tbody>
			</table>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
			if(!$mail->Send())   
			{   
			    echo "<script type=\"text/javascript\">alert('Mail gửi bị lỗi! Vui lòng kiểm tra kết nối mạng!')</script>";
				exit();  
			}   
			else   
			{   
				echo "<script type=\"text/javascript\">alert('Mail đã được gửi đến".$_POST['omail']."')</script>";
				exit();
			} 
		}
 ?>