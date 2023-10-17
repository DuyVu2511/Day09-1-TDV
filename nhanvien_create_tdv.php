<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them moi thong tin nhan vien - Tran Duy Vu</title>
    <link href="css/style.css"/>
</head>
<body>
    <?php
        //1. ket noi
        include("ketnoi_tdv.php");
        //2. tao truy van doc du lieu tu bang
        $sql_pb_tdv = "SELECT * FROM `phongban_tdv` WHERE 1=1";
        $res_pb_tdv = $conn_tdv->query($sql_pb_tdv);
        // => hien thi trong dieu kien select

        // thuc hien them du lieu
        $error_messenger_tdv = "";
        if(isset($_POST["btnSubmit_TDV"])){
            // lay du lieu tren form
            $MANV_TDV = $_POST["MANV_TDV"];
            $HOTEN_TDV = $_POST["HOTEN_TDV"];
            $NGAYSINH_TDV = $_POST["NGAYSINH_TDV"];

            // echo "Gioi tinh:".$_POST["GIOITINH_TDV"];
            // die();
            $GIOITINH_TDV = $_POST["GIOITINH_TDV"];
            $EMAIL_TDV = $_POST["EMAIL_TDV"];
            $TRANGTHAI_TDV = $_POST["TRANGTHAI_TDV"];
            $MAPB_TDV = $_POST["MAPB_TDV"];

            // kiem tra khoa ching khong duoc trung?
            $sql_check_tdv = "SELECT MANV_TDV FROM NHANVIEN_TDV WHERE MANV_TDV = '$MANV_TDV'";
            $res_check_tdv = $conn_tdv->query($sql_check_tdv);
            if($res_check_tdv->num_rows>0){
                $error_messenger_tdv="Loi trung khoa chinh.";
            }
            //thuc hien them moi
            $sql_insert_tdv = "INSERT INTO `nhanvien_tdv` (`MANV_TDV`, `HOTEN_TDV`, `NGAYSINH_TDV`, `GIOITINH_TDV`, `EMAIL_TDV`, `TRANGTHAI_TDV`, `MAPB_TDV`)";
            $sql_insert_tdv .=" VALUES ('$MANV_TDV', '$HOTEN_TDV', '$NGAYSINH_TDV', '$GIOITINH_TDV', '$EMAIL_TDV', '$TRANGTHAI_TDV', '$MAPB_TDV')";

            if($conn_tdv->query($sql_insert_tdv)){
                header("Location: nhanvien_list_tdv.php");
            }else{
                $error_messenger_tdv="Loi them moi " . mysqli_error($conn_tdv); 
            }
        }
    ?>
    <section class="container">
        <h1>Them moi thong tin nhan vien - Tran Duy Vu</h1>
        <form name="frm_tdv" method="post" action="">
            <table border="1" width="100%" cellspacing="0" cellpadding="5">
                <tbody>
                    <tr>
                        <td>Ma nhan vien</td>
                        <td>
                            <input type="text" name="MANV_TDV" id="MANV_TDV">
                        </td>
                    </tr>
                    <tr>
                        <td>Ho ten nhan vien</td>
                        <td>
                            <input type="text" name="HOTEN_TDV" id="HOTEN_TDV">
                        </td>
                    </tr>
                    <tr>
                        <td>Ngay sinh</td>
                        <td>
                            <input type="date" name="NGAYSINH_TDV" id="NGAYSINH_TDV">
                        </td>
                    </tr>
                    <tr>
                        <td>Gioi tinh</td>
                        <td>
                            <input type="radio" name="GIOITINH_TDV" id="NAM_TDV" value="1">
                            <label for="NAM_TDV">Nam</label>
                            <input type="radio" name="GIOITINH_TDV" id="NU_TDV" value="0">
                            <label for="NU_TDV">Nu</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="EMAIL_TDV" id="EMAIL_TDV">
                        </td>
                    </tr>
                    <tr>
                        <td>Trang thai</td>
                        <td>
                            <select name="TRANGTHAI_TDV">
                                <option value="1">Hoat dong</option>
                                <option value="0">Khong hoat dong</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Phong ban</td>
                        <td>
                            <!-- // doc du lieu tu bang phong ban -->
                            <select name="MAPB_TDV" id="MAPB_TDV">
                                <?php
                                    while($row = $res_pb_tdv->fetch_array()):
                                ?>
                                    <option value="<?php echo $row["MAPB_TDV"]?>">
                                        <?php echo $row["TENPB_TDV"]?>
                                    </option>
                                    <?php
                                        endwhile;
                                    ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Them -Tran Duy Vu" name="btnSubmit_TDV">
                            <input type="reset" value="Lam lai -Tran Duy Vu" name="btnReset_TDV">
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <div>
                <?php echo $error_messenger_tdv; ?>
            </div>
        </form>
        <a href="nhanvien_list_tdv.php">Danh sach nhan vien</a>
    </section>
</body>
</html>