<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_get_sach_tu_nha_xuat_ban($nam){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT mt.Id, nv.MaNV, nv.TenNV, dg.MaDG, dg.TenDG, s.MaS, s.TenS, NgayMuon FROM muontra mt, sach s, nhanvien nv, docgia dg WHERE mt.MaS = s.MaS AND mt.MaNV = nv.MaNV and mt.MaDG = dg.MaDG and Year(NgayMuon) = '$nam' ORDER BY mt.Id ASC Limit 0,10";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			include_once("../Classes/PHPExcel.php");
			$nam=$_POST['nam'];
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);
			// tiêu đề
			$sheet = $objPHPExcel->getActiveSheet()->setTitle("TOP 10 SÁCH MƯỢN NĂM ".$nam); // tiêu đề
			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);
			$sheet->getColumnDimension('D')->setAutoSize(true);
			$sheet->getColumnDimension('E')->setAutoSize(true);
			$sheet->getColumnDimension('F')->setAutoSize(true);
			$sheet->getColumnDimension('G')->setAutoSize(true);
			$sheet->getColumnDimension('H')->setAutoSize(true);
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
			// Tieu đề A1
			$ten = 'THỐNG KÊ TOP 10 SÁCH MƯỢN NĂM '.$nam;
			$sheet->setCellValue('A1','TOP 10 SÁCH MƯỢN NĂM '.$nam);
			// Canh giữa A1:F4
			$sheet->getStyle('A1:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A1:H4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			// Cỡ chữ A1
			$objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setSize(16);
			// In đậm tiêu đề
			$objPHPExcel->getActiveSheet()->getStyle("A1:H4")->getFont()->setBold(true);
			$rowCount=4;
			$sheet->setCellValue('A'.$rowCount,'STT');
			$sheet->setCellValue('B'.$rowCount,'Mã nhân viên');
			$sheet->setCellValue('C'.$rowCount,'Tên nhân viên');
			$sheet->setCellValue('D'.$rowCount,'Mã độc giả');
			$sheet->setCellValue('E'.$rowCount,'Tên độc giả');
			$sheet->setCellValue('F'.$rowCount,'Mã sách');
			$sheet->setCellValue('G'.$rowCount,'Tên');
			$sheet->setCellValue('H'.$rowCount,'Ngày mượn');
			$rowCount++;
		  	// lệnh sql
			$rul=tv_get_sach_tu_nha_xuat_ban($nam);
			while ($row=mysqli_fetch_array($rul)) {
				$rowCount++;
				$sheet->setCellValue('A'.$rowCount,$rowCount-5);
				$sheet->setCellValue('B'.$rowCount,$row[1]);
				$sheet->setCellValue('C'.$rowCount,$row[2]);
				$sheet->setCellValue('D'.$rowCount,$row[3]);
				$sheet->setCellValue('E'.$rowCount,$row[4]);
				$sheet->setCellValue('F'.$rowCount,"S".$row[5]);
				$sheet->setCellValue('G'.$rowCount,$row[6]);
				$sheet->setCellValue('H'.$rowCount,$row[7]);
			}
			// Đường viền
			$sheet->getStyle('A4:' . 'H'.$rowCount)
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
		  $sheet->getStyle('F6:F'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('H6:H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  $sheet->getStyle('F6:F'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		  // Canh lề tên đăng nhập, họ tên
		  //$sheet->getStyle('B6:C'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$filename = "Top 10 sách mượn năm $ten.xlsx";
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