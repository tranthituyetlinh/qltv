        <div class="header-cot-hai">
<?php 
        include_once("../admin/config/config.php");
        $hoi = "";
        $tu = $_POST['tu'];
        switch ($_POST['loai']) {
            case '1':
                // tìm theo tên sách
                $hoi="SELECT DISTINCT * FROM `sach` s WHERE `TenS` LIKE N'%$tu%' and xoasach = '0'";
                echo "<h3>Tìm kiếm theo tên sách: ".$tu."</h3>";
                break;
            case '2':
                // tìm kiếm theo loại sách
                $hoi="SELECT DISTINCT * FROM sach s, loaisach ls WHERE ls.MaLS = s.MaLS and ls.TenLS LIKE N'%$tu%' and xoasach = '0'";
                echo "<h3>Tìm kiếm theo loại sách: ".$tu."</h3>";
                break;
            case '3':
                // tìm kiếm theo nhà xuất bản
                $hoi="SELECT DISTINCT * FROM sach s, nhaxuatban nxb WHERE nxb.MaNXB = s.MaNXB AND nxb.TenNXB LIKE N'%$tu%' and xoasach = '0'";
                echo "<h3>Tìm kiếm theo nhà xuất bản: ".$tu."</h3>";         
                break;
            case '4':
                // tìm kiếm theo tác giả
                $hoi="SELECT DISTINCT * FROM sach s, tacgia tg WHERE tg.MaTG = s.MaTG AND tg.TenTG LIKE N'%$tu%' and xoasach = '0'";
                echo "<h3>Tìm kiếm theo tác giả: ".$tu."</h3>";         
                break;
            case '5':
                // tìm theo năm xuất bản
                $hoi="SELECT DISTINCT * FROM `sach` s WHERE `NamXB` LIKE N'%$tu%' and xoasach = '0'";
                echo "<h3>Tìm kiếm theo năm xuất bản: ".$tu."</h3>";
                break; 
            default:
                echo "<h4>Không tìm thấy thông tin!</h4>";
                exit();
        }
        $ketnoi = new clsKetnoi();
        $conn = $ketnoi->ketnoi();
        $result = mysqli_query($conn, $hoi);
 ?>
        </div>
        <?php  while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="bao-sach">
            <a href="#">
              <div class="sach">
                <div class="anh-bia-sach" style="background-image: url('<?php echo $row['HinhAnhS'] ?>');"></div>
                <div class="ten-sach"><?php echo $row['TenS']; ?> <span>(<?php echo $row['SL']; ?>)</span></div>
              </div>
            </a>
          </div>
        <?php } ?>