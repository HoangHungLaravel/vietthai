<?php
    if(isset($_POST['click'])){
        $name = $_POST['name'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $phonenumber = $_POST['phonenumber'];
        $Role_id = $_POST['Role_id'];
        $CMND= $_POST['CMND'];
        
       
        if($name=="" || $username=="" || $password=="" || $phonenumber=="" || $CMND==""){
            $thongbao="Hãy nhập đầy đủ ";
        }else{
            $query="insert staff(name, username, password, phonenumber, Role_id, CMND) values('$name','$username','$password','$phonenumber','$Role_id', '$CMND')";
            $result = $connect->query($query);
       
        if ($result==true){
            echo "<script>window.location.href='?option=nhanvien'</script>";
            }
            else{
                echo "<script>alert('Thêm Không Thành Công')</script>";
            }
        }
        }
  

   
              
        
        
    
?>
<div class="content-wrapper">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h2>Thêm nhân viên</h2>
      
    </div>
    
    
   

<table class="table">
                   
                
                   
<tr>
                       <td>Tên nhân viên </td>
                       <td><input required type="text" name="name" value=""></td>
                   </tr>
                   <tr>
                       <td>Tên đăng nhập</td>
                       <td><input required type="text" name="username" value=""></td>
                   </tr>

                   <tr>
                       <td>số điện thoại</td>
                       <td><input required type="number" name="phonenumber" value=""></td>
                   </tr>

                   <tr>
                       <td>Mật Khẩu</td>
                       <td><input required type="password" name="password" value=""></td>
                   </tr>

                   
                   <tr>
                       <td>ID Phân Quyền</td>
                       <td><input readonly="true" required type="text" name="Role_id" value="2"></td>
                      
                   </tr>

                   <tr>
                       
                       <td>CMND</td>
                       <td><input required type="number" name="CMND" value=""></td>
                       
                   </tr>
                   

                   <tr>

                       <td><button class="btn btn-success" type="submit" name="click">Thêm</button></td>
                   </tr>
                  
               </table>
  </form>

</div>
