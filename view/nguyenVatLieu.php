<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý nguyên vật liệu</title>

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../fontawesome-free-6.2.0-web/css/all.css" />
    <link rel="stylesheet" href="../css/phieuNhap.css" />
    <link rel="stylesheet" href="../css/nguyenVatLieu.css">

    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/moment.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="../js/baoCao.js"></script>
</head>

<body>

    <div class="section">
        <div class="trai">
            <div class="navbar navbar-brand"><img src="../image/logo.jpg" alt="" height="200px"></div><br></br><br></br>
            <div class="vertical-menu">
                <div class="menu">
                    <div class="item"><a href="#">Trang chủ</a></div>
                    <div class="item"> <a href="baoCao.php">Báo cáo</a></div>
                    <div class="item"> <a href="#" class="sub-btn">Đơn yêu cầu <i class="fas fa-angle-right dropdown"></i> </a>
                        <div class="sub-menu">
                            <a class="sub-item" href="phieuNhap.php">Đơn yêu cầu nhập</a>
                            <a class="sub-item" href="phieuXuat.php">Đơn yêu cầu xuất</a>
                        </div>
                    </div>
                    <div class="item" id="nvls"><a href="#" class="sub-btn">Quản lý nguyên vật liệu/thành phẩm<i class="fas fa-angle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a class="sub-item" href="nguyenVatLieu.php">Nguyên vật liệu</a>
                            <a class="sub-item" href="thanhPham.php">Thành phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="phai">
            <div class="phanphoi">
                <a href="#">
                    <h3>Quản lý nguyên vật liệu/thành phẩm > Nguyên vật liệu</h3>
                </a>
            </div>
            <div class="khung">
                <div class="ThemNguyenVatLieu">
                    <button type="button" class="btn btn-success" style="border-radius: 20px; "><a href="themNguyenVatLieu.php">Thêm nguyên vật liệu</a></button>
                </div>
                <table class="table">
                    <div class="LocPhieu" style="display: inline;"><button class="btn-lpxk" style="padding:10px 20px; ">Lọc nguyên vật liệu <i class="fa-solid fa-caret-right fa-rotate-90"></i></button>
                        <form class="search">
                            <input type="text" name="search" id="search" placeholder="Tìm kiếm theo Mã phiếu hoặc Tên phiếu" style="position: relative;left: 67px;top: 0px;">
                        </form>
                    </div>

                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input bang" type="checkbox" value="" id="flexCheckChecked" checked>

                            </div>
                        </th>
                        <th class="bang">Mã nguyên liệu </th>
                        <th class="bang">Tên nguyên liệu</th>
                        <th class="bang">Số lượng</th>
                        <th class="bang">Đơn vị</th>
                        <th class="bang">Loại</th>
                        <th class="bang">Thao tác</th>

                    </tr>


                    <?php
                    $conn = new mysqli("localhost", "son", "123456", "quanlykho");
                    mysqli_set_charset($conn, "utf8");
                    $sql = "SELECT * FROM sanpham WHERE Loai = ' Nguyên vật liệu'";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row["MaSanPHam"]; ?></td>
                            <td><?php echo $row["MaSanPHam"]; ?></td>
                            <td><?php echo $row["TenSanPham"]; ?></td>
                            <td><?php echo $row["SoLuongTon"]; ?></td>
                            <td><?php echo $row["DonVi"]; ?></td>
                            <td><?php echo $row["Loai"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-ChucNang btn-success" style="border-radius: 60px;"><a href="suaNguyenVatLieu.php?MaSanPHam=<?php echo $row["MaSanPHam"]; ?>">Sửa</a></button>
                                <button type="button" class="btn btn-ChucNang btn-danger" style="border-radius: 60px; "><a href="xoaNguyenVatLieu.php?MaSanPHam=<?php echo $row["MaSanPHam"]; ?>">Xóa</a></button>
                            </td>
                        </tr>
                    <?php } ?>


                </table>
            </div>
        </div>



        <!-- Xóa Modal -->
        <div class="modal fade" id="XoaModal">
            <div class="modal-dialog ">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa nguyên vật liệu</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Bạn có muốn xóa nguyên liệu/thành phẩm không?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="btn-XoaNguyenLieu">Xóa</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>