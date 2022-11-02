<?php 
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE from staff where id='$id'";
    $result = mysqli_query($connect,$sql);
    if($result == true){
      echo "<script>window.location.href=' ?option=nhanvien'</script>";
        
    }
    else{
        echo "Không thực hiện được xóa, xem lại câu truy vấn";
    }

}
?> 

<div class="content-wrapper">
  <h1 style="text-align:center">Nhân Viên</h1>
  <table class="table table-bordered">
      <thead>
          <tr>
             
              <th>Tên</th>
              
              <th>Tên Đăng Nhập</th>
              <th>Mật khẩu</th>
              <th>số điện thoại</th>
              <th>ID Phân Quyền</th>
              <th>CMND</th>
              <th>Hoạt Động</th>
          </tr>
      </thead>
      <tbody>
      <?php
    $query = "select * from staff where Role_id=2" ;
    $result = mysqli_query($connect, $query);
?>  
         
          <?php foreach($result as $item):?>
              <tr class="">
                  
                 
                  <td><?= $item["name"]?></td>
                  <td><?= $item["username"]?></td>
                  <td><?= $item["password"]?></td>
                  <td><?= $item["phonenumber"]?></td>
                  <td><?= $item["Role_id"]?></td>
                  <td><?= $item["CMND"]?></td>
                  
                  <td>
                    <a class="btn btn-warning" href="?option=Update_staff&id=<?=$item['id']?>" >Sửa </a> ||
                    <a  class="btn btn-danger" href="?option=nhanvien&id=<?= $item['id']?>"> Xóa</a>
                  </td>
              </tr>
          <?php
            endforeach;
          ?>
      </tbody>
  </table>
  <a  class="btn btn-success" href="?option=add_staff"> Thêm</a>
</div>


