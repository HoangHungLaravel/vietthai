<?php
    $id = $_GET['id'];
    $query = "select * from customer where id=$id";
    $ketnoi = mysqli_query($connect, $query);
    $result = mysqli_fetch_array($ketnoi);
?>
<?php
    if(isset($_POST['click'])){
        $fullname = $_POST['fullname'];
        $phonenumber= $_POST['phonenumber'];
        $address = $_POST['address'];
        $CMND = $_POST['CMND'];
        
        
        
        if($fullname == '' || $phonenumber=='' || $address == '' || $CMND == ''){
            $thongbao = "Hãy nhập đầy đủ tất cả thông tin";
        }else{
            $query = "update customer set fullname = '$fullname', phonenumber = '$phonenumber', address = '$address', CMND = '$CMND' where id=$id";
            $result = mysqli_query($connect, $query);
        if($result==true){
            echo "<script>window.location.href='?option=khachhang'</script>";
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
      <h2> Thông Tin Khách Hàng</h2>
      
    </div>
    
    
   

<table class="table">
                   
                
                   
                   <tr>
                       <td>Họ Và Tên</td>
                       <td><input required type="text" name="fullname" value="<?=$result['fullname']?>"></td>
                   </tr>
                   <tr>
                       <td>số điện thoại </td>
                       <td><input required type="number" name="phonenumber" value="<?=$result['phonenumber']?>"></td>
                   </tr>

                   <tr>
                       <td>Địa chỉ </td>
                       <td><input required type="text" name="address" value="<?=$result['address']?>"></td>
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
