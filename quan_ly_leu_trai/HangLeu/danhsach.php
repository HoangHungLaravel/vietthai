<?php 
 if(isset($_GET['id'])){
   $id=$_GET['id'];
    $sql="DELETE from products where id='$id'";
    $result = mysqli_query($connect,$sql);
    if($result == true){
      echo "<script>window.location.href=' ?option=HangLeu'</script>";
        
    }
    else{
        echo "Không thực hiện được xóa, xem lại câu truy vấn";
    }

}
?> 

<div class="content-wrapper">
  <h1 style="text-align:center">Sản Phẩm</h1>
  <table class="table table-bordered">
      <thead>
          <tr>
             
              <th>Mã Sản Phẩm</th>
              <th>Danh Mục</th>
              <th>Tên Sản Phẩm</th>
              <th>Số Lượng</th>
              <th>Hình ảnh</th>
              <th>Trạng thái</th>
              <th>Hoạt Động</th>
              <th>Tác Vụ</th>
              
          </tr>
      </thead>
      <tbody>
      <?php
    $query = "select * from products";
    $result = mysqli_query($connect, $query);
    
?>  
         
          <?php 
          foreach($result as $item): 
            $id_category = $item['id_category'];
            
            $sql1 = "select * from category where id=$id_category ";
            $ketnoi=mysqli_query($connect,$sql1);
            $ten_cate= mysqli_fetch_array($ketnoi);
            ?>
              <tr >
                  
                  <td><?= $item["id"]?></td>
                  <td><?= $ten_cate['name']?></td>
                  <td><?= $item["title"]?></td>
                  <td><?= $item["num"]?></td>
                  <td><img width="70" src="./dist/img/<?= $item['images'] ?>" alt=""></td>
                  <td>
                    <?php if($item['trangthai']==1) {
                      ?><span class="badge badge-success text-uppercase">Sẵn sàng</span> <?php }?><?php if($item['trangthai']==2){
                        ?><span class="badge badge-dark text-uppercase">Chưa sẵn sàng</span><?php }?>
                  </td>
                  <td>
                  <?php if ($item['trangthai'] == 2) {

?><a href="./doitrangthai.php?id=<?php echo $item['id']?>&trangthai=2"><button class="btn btn-primary" style="padding:5px; width:85px;" name="baohanhxong">Cập nhật</button></a><?php }
                                                                                                                                                                          if ($item['trangthai'] == 1) {
                                                                                                                                                                            ?> <a href="./doitrangthai.php?id=<?php echo $item['id']?>&trangthai=1"><button class="btn btn-primary" style="padding:5px; width:85px;" name="dembaohanh">Cập nhật</button></a><?php } ?>

</td>
                  </td>

</td>

                  <td>
                    <a class="btn btn-warning" href="?option=updatehangleu&id=<?=$item['id']?>" >Sửa </a> ||
                    <a  class="btn btn-danger" href="?option=HangLeu&id=<?= $item['id']?>"> Xóa</a>
                  </td>
              </tr>
          <?php
          
            endforeach;
          ?>
      </tbody>
  </table>
  <a  class="btn btn-success" href="?option=addproduct"> Thêm</a>
</div>


