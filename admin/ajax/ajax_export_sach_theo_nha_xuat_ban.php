<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_get_sach_tu_nha_xuat_ban($nxb){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT s.MaS, s.TenS, ls.TenLS, tg.TenTG, nxb.TenNXB,s.NamXB, s.SoTrang, s.SL, s.Gia, s.NgayNhap FROM sach s,tacgia tg, loaisach ls, nhaxuatban nxb WHERE s.MaLS = ls.MaLS and s.MaTG = tg.MaTG and s.MaNXB = nxb.MaNXB and `XoaSach`= '0' and nxb.`MaNXB` = '$nxb'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			include_once("../Classes/PHPExcel.php");
			$ma=$_POST['ma'];
			$ten=$_POST['ten'];
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			// tiêu đề
			$sheet = $objPHPExcel->getActiveSheet()->setTitle("THỐNG KÊ ".$ma); // tiêu đề
			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);
			$sheet->getColumnDimension('D')->setAutoSize(true);
			$sheet->getColumnDimension('E')->setAutoSize(true);
			$sheet->getColumnDimension('F')->setAutoSize(true);
			$sheet->getColumnDimension('G')->setAutoSize(true);
			$sheet->getColumnDimension('H')->setAutoSize(true);
			$sheet->getColumnDimension('I')->setAutoSize(true);
			$sheet->getColumnDimension('J')->setAutoSize(true);
			$sheet->getColumnDimension('K')->setAutoSize(true);
			// GỌP CỘT
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:K3');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A4:A5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B4:B5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C4:C5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('D4:D5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E4:E5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('F4:F5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('G4:G5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('H4:H5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('I4:I5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('J4:J5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('K4:K5');
			// Tieu đề A1
			//$ten = strtoupper($ten);
			$sheet->setCellValue('A1','THỐNG KÊ SÁCH THEO '.$ten);
			// Canh giữa A1:F4
			$sheet->getStyle('A1:K4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A1:K4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			// Cỡ chữ A1
			$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(16);
			// In đậm tiêu đề
			$objPHPExcel->getActiveSheet()->getStyle("A1:K4")->getFont()->setBold(true);
			$rowCount=4;
			$sheet->setCellValue('A'.$rowCount,'STT');
			$sheet->setCellValue('B'.$rowCount,'Mã sách');
			$sheet->setCellValue('C'.$rowCount,'Tên sách');
			$sheet->setCellValue('D'.$rowCount,'Loại sách');
			$sheet->setCellValue('E'.$rowCount,'Tên tác giả');
			$sheet->setCellValue('F'.$rowCount,'Tên nhà xuất bản');
			$sheet->setCellValue('G'.$rowCount,'Năm xuất bản');
			$sheet->setCellValue('H'.$rowCount,'Số trang');
			$sheet->setCellValue('I'.$rowCount,'Số lượng');
			$sheet->setCellValue('J'.$rowCount,'Giá');
			$sheet->setCellValue('K'.$rowCount,'Ngày nhập');
			$rowCount++;
		  	// lệnh sql
			$rul=tv_get_sach_tu_nha_xuat_ban($ma);
			while ($row=mysqli_fetch_array($rul)) {
				$rowCount++;
				$sheet->setCellValue('A'.$rowCount,$rowCount-5);
				$sheet->setCellValue('B'.$rowCount,"S".$row[0]);
				$sheet->setCellValue('C'.$rowCount,$row[1]);
				$sheet->setCellValue('D'.$rowCount,$row[2]);
				$sheet->setCellValue('E'.$rowCount,$row[3]);
				$sheet->setCellValue('F'.$rowCount,$row[4]);
				$sheet->setCellValue('G'.$rowCount,$row[5]);
				$sheet->setCellValue('H'.$rowCount,$row[6]);
				$sheet->setCellValue('I'.$rowCount,$row[7]);
				$sheet->setCellValue('J'.$rowCount,$row[8]);
				$sheet->setCellValue('K'.$rowCount,$row[9]);
			}
			// Đường viền
			$sheet->getStyle('A4:' . 'K'.$rowCount)
		                    ->applyFromArray(array(
		                        'borders' => array(
		                            'allborders' => array(
		                                'style' => PHPExcel_Style_Border::BORDER_THIN
		                            )
		                        )
            				));
		  // Canh giữa số thứ tự
		  $sheet->getStyle('A5:A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  // Canh lề ngày nhập
		  $sheet->getStyle('B6:B'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('G6:G'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('H6:H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('J6:K'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  // Canh lề tên đăng nhập, họ tên
		  //$sheet->getStyle('B6:C'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$filename = "Thống kê $ten.xlsx";
			$objWriter->save($filename);
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
			header('Content-Length: ' . filesize($filename));
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate');
			header('Pragma: no-cache');
			readfile($filename);
			return;
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>