<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SACH NHAN VIEN - Tran Duy Vu</title>
    <link href="css/style.css"/>
</head>
<body>
    <?php
        //1. ket noi
        include("ketnoi_tdv.php");
        //2. tao truy van doc du lieu tu bang
        $sql_tdv = "SELECT * FROM `nhanvien_tdv` WHERE 1=1";
        //3. thuc thi cau lenh truy van
        $result_tdv = $conn_tdv->query($sql_tdv);
        //4. duyet va hien thi ket qua - > tbody
    ?>
    <section class="container">
        <h1>DANH SACH NHAN VIEN - Tran Duy Vu</h1>
        <hr/>
        <a href="nhanvien_create_tdv.php" class="btn">Them moi nhan vien</a>
        <table width="100%" align="center" border="1px">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ma</th>
                    <th>Hoten</th>
                    <th>Ngaysinh</th>
                    <th>Gioitinh</th>
                    <th>Email</th>
                    <th>Trang thai</th>
                    <th>Phong ban</th>
                    <th>Chuc nang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt_tdv =0;
                    while($row_tdv = $result_tdv->fetch_array()){
                        $stt_tdv++;
                ?>
                    <tr>
                        <td><?php echo $stt_tdv; ?></td>
                        <td><?php echo $row_tdv["MANV_TDV"]; ?></td>
                        <td><?php echo $row_tdv["HOTEN_TDV"]; ?></td>
                        <td><?php echo $row_tdv["NGAYSINH_TDV"]; ?></td>
                        <td><?php echo $row_tdv["GIOITINH_TDV"]; ?></td> 
                        <td><?php echo $row_tdv["EMAIL_TDV"]; ?></td> 
                        <td><?php echo $row_tdv["TRANGTHAI_TDV"]; ?></td> 
                        <td><?php echo $row_tdv["MAPB_TDV"]; ?></td> 
                        <td>
                            <a href="nhanvien_edit_tdv.php?manv_tdv=<?php echo $row_tdv["MANV_TDV"];?>">Sua</a>
                            <a href="nhanvien_list_tdv.php?manv_tdv=<?php echo $row_tdv["MANV_TDV"];?>">Xoa</a>

                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="nhanvien_create_tdv.php" class="btn">Them moi nhan vien</a>
    </section>
</body>
</html>