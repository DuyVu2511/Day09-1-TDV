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
        //doc du lieu can sua
        if(isset($_GET["manv_tdv"])){
            // lay ma nhan vien can sua
            $MANV_TDV = $_GET["manv_tdv"];
            // tao truy van doc du lieu tu banh nhan vien theo ma nhan vien
            $sql_edit_tdv = "SELECT * FROM `nhanvien_tdv` WHERE MANV_TDV='$MANV_TDV'";
            // thuc thi cau lenh truy van
            $result_edit_tdv = $conn_tdv->query($sql_edit_tdv);
            // doc ban ghi tu ket qua
            $row_edit_tdv = $result_edit_tdv->fetch_array();
        }else{
            header("Location: nhanvien_list_tdv.php");
        }
        // doc du lieu tu phong ban
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
            
            $sql_update_tdv = "UPDATE nhanvien_tdv SET";
            $sql_update_tdv .=" HOTEN_TDV = '$HOTEN_TDV',";
            $sql_update_tdv .=" $NGAYSINH_TDV = '$$NGAYSINH_TDV',";
            $sql_update_tdv .=" $GIOITINH_TDV = '$GIOITINH_TDV',";
            $sql_update_tdv .=" $EMAIL_TDV = '$EMAIL_TDV',";
            $sql_update_tdv .=" $TRANGTHAI_TDV = '$TRANGTHAI_TDV',";
            $sql_update_tdv .=" $MAPB_TDV = '$MAPB_TDV',";
            $sql_update_tdv .=" WHERE MANV_TDV = '$MANV_TDV',";


            if($conn_tdv->query($sql_insert_tdv)){
                header("Location: nhanvien_list_tdv.php");
            }else{
                $error_messenger_tdv="Loi sua du lieu " . mysqli_error($conn_tdv); 
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
                            <input type="text" name="MANV_TDV" id="MANV_TDV" readonly
                                value="<?php echo $row_edit_tdv["MANV_TDV"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ho ten nhan vien</td>
                        <td>
                            <input type="text" name="HOTEN_TDV" id="HOTEN_TDV"
                                value="<?php echo $row_edit_tdv["HOTEN_TDV"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ngay sinh</td>
                        <td>
                            <input type="date" name="NGAYSINH_TDV" id="NGAYSINH_TDV"
                                value="<?php echo $row_edit_tdv["NGAYSINH_TDV"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Gioi tinh</td>
                        <td>
                            <input type="radio" name="GIOITINH_TDV" id="NAM_TDV" value="1"
                                <?php if($row_edit_tdv["GIOITINH_TDV"]==1){echo "checked";} ?>>
                            <label for="NAM_TDV">Nam</label>
                            <input type="radio" name="GIOITINH_TDV" id="NU_TDV" value="0"
                                <?php if($row_edit_tdv["GIOITINH_TDV"]==0){echo "checked";} ?>>
                            <label for="NU_TDV">Nu</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="EMAIL_TDV" id="EMAIL_TDV"
                                value="<?php echo $row_edit_tdv["EMAIL_TDV"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Trang thai</td>
                        <td>
                            <select name="TRANGTHAI_TDV">
                                <option value="1" <?php if($row_edit_tdv["TRANGTHAI_TDV"]==1){echo "checked";} ?>>Hoat dong</option>
                                <option value="0" <?php if($row_edit_tdv["TRANGTHAI_TDV"]==0){echo "checked";} ?>>Khong hoat dong</option>
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
                                    <option value="<?php echo $row["MAPB_TDV"]?>"
                                        <?php
                                            if($row["MAPB_TDV"]==$row_edit_tdv["TRANGTHAI_TDV"]){
                                                echo "selected";
                                            }
                                        ?>
                                        >
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
                            <input type="submit" value="Cap nhat -Tran Duy Vu" name="btnSubmit_TDV">
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