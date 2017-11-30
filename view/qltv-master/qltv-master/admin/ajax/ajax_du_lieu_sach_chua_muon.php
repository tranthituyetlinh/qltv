<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_get_sach_dang_muon(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT s.MaS, s.TenS, ls.TenLS, s.SL FROM sach s, muontra mt, loaisach ls WHERE s.MaLS = ls.MaLS AND s.MaS NOT IN (SELECT m.MaS FROM muontra m WHERE 1) GROUP BY s.MaS, s.TenS, ls.TenLS, s.SL";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			include_once("../Classes/PHPExcel.php");
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			// tiêu đề
			$sheet = $objPHPExcel->getActiveSheet()->setTitle("THỐNG KÊ SÁCH CHƯA MƯỢN"); // tiêu đề
			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);
			$sheet->getColumnDimension('D')->setAutoSize(true);
			$sheet->getColumnDimension('E')->setAutoSize(true);
			// GỌP CỘT
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E3');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A4:A5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B4:B5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C4:C5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('D4:D5');
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E4:E5');
			// Tieu đề A1
			$ten = 'THỐNG KÊ SÁCH CHƯA MƯỢN';
			$sheet->setCellValue('A1','THỐNG KÊ SÁCH CHƯA MƯỢN');
			// Canh giữa A1:F4
			$sheet->getStyle('A1:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A1:E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			// Cỡ chữ A1
			$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(16);
			// In đậm tiêu đề
			$objPHPExcel->getActiveSheet()->getStyle("A1:E4")->getFont()->setBold(true);
			$rowCount=4;
			$sheet->setCellValue('A'.$rowCount,'STT');
			$sheet->setCellValue('B'.$rowCount,'Mã sách');
			$sheet->setCellValue('C'.$rowCount,'Tên sách');
			$sheet->setCellValue('D'.$rowCount,'Loại sách');
			$sheet->setCellValue('E'.$rowCount,'Số lượng');
			$rowCount++;
		  	// lệnh sql
			$rul=tv_get_sach_dang_muon();
			while ($row=mysqli_fetch_array($rul)) {
				$rowCount++;
				$sheet->setCellValue('A'.$rowCount,$rowCount-5);
				$sheet->setCellValue('B'.$rowCount,"S".$row[0]);
				$sheet->setCellValue('C'.$rowCount,$row[1]);
				$sheet->setCellValue('D'.$rowCount,$row[2]);
				$sheet->setCellValue('E'.$rowCount,$row[3]);
			}
			// Đường viền
			$sheet->getStyle('A4:' . 'E'.$rowCount)
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
		  $sheet->getStyle('E5:E'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  // Canh lề tên đăng nhập, họ tên
		  //$sheet->getStyle('B6:C'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$filename = "$ten.xlsx";
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