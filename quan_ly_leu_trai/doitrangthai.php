<?php
$connect=new MySQLi("localhost","root","","quanlyleutrai");

 //Doi tinh trang Lều
if (isset($_GET['id']) && isset($_GET['trangthai'])) {
    $id = $_GET['id'];
    if ($_GET['trangthai'] == 2) {
        $trangthai = 1;
        $sql="UPDATE `products` SET `trangthai`=$trangthai WHERE id=$id";
        $doitrangthai=mysqli_query($connect,$sql);
        header("Location: ./?option=HangLeu");
    }
    if ($_GET['trangthai'] == 1) {
        $trangthai = 2;
        $sql="UPDATE `products` SET `trangthai`=$trangthai WHERE id=$id";
        $doitrangthai=mysqli_query($connect,$sql);
        header("Location: ./?option=HangLeu");
    }
}






?>