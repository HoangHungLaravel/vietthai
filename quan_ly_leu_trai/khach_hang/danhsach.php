<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE from customer where id='$id'";
        $result = mysqli_query($connect,$sql);
        if($result == true){
          echo "<script>window.location.href=' ?option=khachhang'</script>";
            
        }
        else{
            echo "Không thực hiện được xóa, xem lại câu truy vấn";
        }
    
    }
?>


<div class="content-wrapper">
  <h1 style="text-align:center">KHÁCH HÀNG</h1>
  <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              <th>ID</th>
              <th>Họ Và Tên</th>
              <th>Số Điện Thoại</th>
              <th>Địa Chỉ</th>
              <th>CMND</th>
             
              <th>Hoạt Động</th>
          </tr>
      </thead>
      <?php
    $query = "select * from customer" ;
    $result = mysqli_query($connect, $query);
    ?>  
      <tbody>
          <?php $count=1;?>
          <?php foreach($result as $item):?>
              <tr class="">
                  <td><?=$count++?></td>
                  <td><?= $item["id"]?></td>
                  <td><?= $item["fullname"]?></td>
                  <td>+84 <?= $item["phonenumber"]?></td>
                  <td><?= $item["address"]?></td>
                  <td><?= $item['CMND'] ?></td>
                  
                  <td>
                    <a class="btn btn-warning" href="?option=Update_cus&id=<?=$item['id']?>">Sửa </a> ||
                    <a  class="btn btn-danger" href="?option=khachhang&id=<?= $item['id']?>"> Xóa</a>
                  </td>
              </tr>
          <?php
            endforeach;
          ?>
      </tbody>
  </table>
  <a  class="btn btn-success" href="?option=add_customer"> Thêm</a>
</div>

