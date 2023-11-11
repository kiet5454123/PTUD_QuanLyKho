<?php
require_once './db.php';
require_once './helper.php';
if (isset($_POST['SoLuongTon']) && isset($_POST['DonVi'])) {
  $tableName = 'chitietsanpham';
  $sql = "UPDATE $tableName SET SoLuongTon = '" . $_POST['SoLuongTon'] . "', DonVi= '" . $_POST['DonVi'] . "' WHERE MaSanPHam = " . $_GET['id'];
  if ($conn->query($sql) === TRUE) {
    echo '<p style="color:green">Cập nhật thành công</p>';
  } else {
    echo '<p style="color:green">Cập nhật không thành công</p>' . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chi tiết nguyên liệu</title>
  <link rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" href="css/overlay.css" />
  <link rel="stylesheet" href="css/form.css" />
  <link rel="stylesheet" href="css/button.css" />
  <link rel="stylesheet" href="css/phanPhoiDonYeuCau.css" />
  <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.css" />
  <style>
    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="menu">
      <div class="image"></div>
      <div class="nav">
        <ul>
          <li><a href="#">Trang chủ</a></li>
          <li><a href="timKiem.php">Tìm kiếm</a></li>
          <li class="show">
            <p>Quản lý kho <i class="fa-solid fa-angle-down"></i></p>
            <ul>
              <li><a href="quanLyKho.php">Tất cả nguyên liệu</a></li>
              <li><a href="soLuongTon.php">Cập nhật số lượng tồn</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <a href="#">
        <h3>Quản lý kho > nguyên liệu</h3>
      </a>
      <form class="search">
        <input type="text" name="search" id="search" />
        <button type="button">
          <i class="fa-solid fa-magnifying-glass" style="color: #1e5cc8"></i>
        </button>
      </form>
      <div class="content__inner chitiet">

        <?php
        if (isset($_GET['id'])) {
          $tableName = 'sanpham';
          $tableJoin = 'chitietsanpham';
          $sql = "SELECT $tableName.MaSanPHam,$tableName.TenSanPham,$tableJoin.SoLuongTon,$tableJoin.DonVi,$tableJoin.NgaySanXuat,$tableJoin.NgayHetHan,$tableJoin.TrangThai FROM $tableName  INNER JOIN $tableJoin ON $tableName.MaSanPHam=$tableJoin.MaSanPHam Where $tableName.MaSanPHam =  " . $_GET['id'] . '';
          $result = $conn->query($sql);
          while ($row = $result->fetch_assoc()) {
            echo '  <h3>Chi tiết nguyên liệu</h3>
              <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">  
              <p><span class="deMuc">Mã chi tiết nguyên liệu:</span>' . $row['MaSanPHam'] . '</p>
          <p><span class="deMuc">Tên nguyên liệu :</span>' . $row['TenSanPham'] . '</p>
          <p><span class="deMuc">Số lượng:</span><input type="text" value="' . $row['SoLuongTon'] . '" style="width:100%" name="SoLuongTon" required/></p>
          <p><span class="deMuc">Đơn vị:</span><input type="text" value="' . $row['DonVi'] . '" style="width:100%" name="DonVi" required/></p>
          <p><span class="deMuc">Ngày nhập kho:</span>24/09/2023</p>
          <p><span class="deMuc">Ngày xuất kho:</span>24/09/2023</p>
          <p><span class="deMuc">Ngày hết hạn:</span>' . $row['NgayHetHan'] . '</p>
          <p><span class="deMuc" style="margin-bottom:20px;">Tình trạng:</span>' . $row['TrangThai'] . '</p> 
           <div class="buttons" style="margin: auto;justify-content:center" >
          <button class="btn primary">Lưu thay đổi</button>
          <a href="soLuongTon.php" class="btn secondary small" style="background:#b6b6b6;text-decoration:none;color:white">Quay lại</a>
        </div>
        </form>';
          }
        } else {
          echo '  <h3>Không tìm thấy dữ liệu</h3>';
        }

        ?>



      </div>
    </div>
  </div>
  <div class="overlayDiv"></div>
</body>

</html>