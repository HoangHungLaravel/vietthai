<?php
    
    $id = $_GET['id'];
    $query = "select * from staff where id=$id";
    $ketnoi = mysqli_query($connect, $query);
    $result = mysqli_fetch_array($ketnoi);
?>
<?php
    if(isset($_POST['click'])){
        $name = $_POST['name'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $phonenumber = $_POST['phonenumber'];
        $Role_id = $_POST['Role_id'];
        $CMND= $_POST['CMND'];
        
       
        if($name=="" || $username=="" || $password=="" || $phonenumber=="" || $CMND==""){
           $thongbao="Hãy nhập đầy đủ thông tin";
        }else{
            $query = "update staff set name = '$name', username = '$username', Role_id='$Role_id',password = '$password', phonenumber = '$phonenumber', CMND = '$CMND' where id=$id " ;
            $result = $connect->query($query);
            if($result==true){
                echo "<script>window.location.href='?option=nhanvien'</script>";
            }
            else{
                echo "<script>alert('Không Thành Công')</script>";
            }
            
        }
        
        
       
        
    }
?>

<div class="content-wrapper">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h2>Thông tin nhân viên </h2>
      
    </div>
    
    
   

<table class="table">
                   
                
                   
                   <tr>
                       <td>Tên nhân viên </td>
                       <td><input required type="text" name="name" value="<?=$result['name']?>"></td>
                   </tr>
                   <tr>
                       <td>Tên đăng nhập</td>
                       <td><input required type="text" name="username" value="<?=$result['username']?>"></td>
                   </tr>

                   <tr>
                       <td>Số Điện Thoại</td>
                       <td><input required type="number" name="phonenumber" value="<?=$result['phonenumber']?>"></td>
                   </tr>

                   <tr>
                       <td>Mật Khẩu</td>
                       <td><input required type="password" name="password" value="<?=$result['password']?>"></td>
                   </tr>

                     <tr>
                       <td>ID Phân Quyền</td>
                       <td><input readonly="true" required type="text" name="Role_id" value="2"></td>
                      
                   </tr>
                   <tr>
                       
                       <td>CMND</td>
                       <td><input required type="number" name="CMND" value="<?=$result['CMND']?>"></td>
                   </tr>
                   <tr>

                       <td><button class="btn btn-warning" type="submit" name="click">Update</button></td>
                   </tr>
                  
               </table>
  </form>

</div>
