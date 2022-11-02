<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['click'])){
        $id_category = $_POST['id_category'];
        $title= $_POST['title'];
        $num = $_POST['num'];
        
        
        
        
        $store="./dist/img/";
        $imageName=$_FILES['image']['name'];
        $imageTemp=$_FILES['image']['tmp_name'];
        $exp3=substr($imageName, strlen($imageName) - 3);//123.jpg thì lấy sau dấu chấm
        $exp4=substr($imageName, strlen($imageName) - 4);
        if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
            //$imageName=time().'_'.$imageName;
                move_uploaded_file($imageTemp,$store.$imageName);
                $query="insert products(id_category,num, title, images) values('$id_category','$num','$title', '$imageName')";
                $result = $connect->query($query);
                echo "<script>window.location.href='?option=HangLeu'</script>";
        }else{
            echo "<script>alert('File đã chọn không phải file ảnh')</script>";
        }
        
    }
?>
<div class="content-wrapper">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h2>Thêm Sản Phẩm</h2>
      
    </div>
    
    
   

<table class="table  ">
                   
                
                   
                   <tr>
                       <td>Mã Danh Mục</td>
                       <td><input required type="text" name="id_category" value=""></td>
                   </tr>
                   <tr>
                       <td>Tên Sản Phẩm </td>
                       <td><input required type="text" name="title" value=""></td>
                   </tr>

                   <tr>
                       <td>Số lượng </td>
                       <td><input required type="number" name="num" value=""></td>
                   </tr>
                  
                   <tr>
                       
                       <td>hinhanh</td>
                       <td><input type="file" name="image" ></td>
                   </tr>

                   <tr>

                       <td><button class="btn btn-success" type="submit" name="click">Thêm</button></td>
                   </tr>
                  
               </table>
  </form>

</div>
</body>
</html>

