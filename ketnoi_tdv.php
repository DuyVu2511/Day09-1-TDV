<?php
    // ket noi den may chu csdl
    $conn_tdv = new mysqli("localhost","root","","k22cntt3_tranduyvu");
    // echo $conn_tdv
    if($conn_tdv->errno){
        echo "<h2> Loi: ".mysqli_error($conn_tdv) ."</h2>";
    }else{
        echo "<h2> Tran Duy Vu - 2210900138 </h2>";
    }
?>

