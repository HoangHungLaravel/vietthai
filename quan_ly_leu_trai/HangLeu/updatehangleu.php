<?php
    $id = $_GET['id'];
    $query = "select * from products where id=$id";
    $ketnoi = mysqli_query($connect, $query);
    $result = mysqli_fetch_array($ketnoi);
?>
<?php
    if(isset($_POST['click'])){
        $id_category = $_POST['id_category'];
        $title= $_POST['title'];
        $num= $_POST['num'];
       
        
        
        
        $store="./dist/img/";
        $imageName=$_FILES['image']['name'];
        $imageTemp=$_FILES['image']['tmp_name'];
        $exp3=substr($imageName, strlen($imageName) - 3);//123.jpg thì lấy sau dấu chấm
        $exp4=substr($imageName, strlen($imageName) - 4);
        if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
            //$imageName=time().'_'.$imageName;
                move_uploaded_file($imageTemp,$store.$imageName);
                
        }else{
            echo "<script>alert('File đã chọn không phải file ảnh')</script>";
        }
        if(empty($imageName)){
            $imageName = $result['images'];
        }
        
        $query = "update products set id_category = '$id_category', title = '$title', images = '$imageName',num='$num' where id=$id";
        $result = $connect->query($query);
        echo "<script>window.location.href='?option=HangLeu'</script>";
    }
?>

<div class="content-wrapper">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h2> Sản Phẩm</h2>
      
    </div>
    
    
   

<table class="table ">
                   
                
                   
                   <tr>
                       <td>Mã Danh Mục</td>
                       <td><input required type="text" name="id_category" value="<?=$result['id_category']?>"></td>
                   </tr>
                   <tr>
                       <td>Tên Sản Phẩm </td>
                       <td><input required type="text" name="title" value="<?=$result['title']?>"></td>
                   </tr>

                   <tr>
                       <td>Số lượng </td>
                       <td><input required type="number" name="num" value="<?=$result['num']?>"></td>
                   </tr>
                   <tr>
                       
                       <td>hinhanh</td>
                       <td><input type="file" name="image" ></td>
                   </tr>
                   <tr>
                      
                      <td>
                           <img width="70" src="./dist/img/<?= $result['images'] ?>" alt="">
                      </td>
                  </tr>

                   <tr>

                       <td><button class="btn btn-warning" type="submit" name="click">Update</button></td>
                   </tr>
                  
               </table>
  </form>

</div>
