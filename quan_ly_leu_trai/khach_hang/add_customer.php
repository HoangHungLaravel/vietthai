<?php
    if(isset($_POST['click'])){
        $fullname = $_POST['fullname'];
        $phonenumber= $_POST['phonenumber'];
        $address = $_POST['address'];
        $CMND = $_POST['CMND'];
      
        if( $fullname == '' || $phonenumber=='' || $address == '' || $CMND == '' ){
            $thongbao = "Hãy nhập đầy đủ tất cả thông tin";
        } 
        else {    
            $query="insert customer(fullname, phonenumber, address,CMND) values('$fullname','$phonenumber','$address','$CMND')";
            
            
            $result= mysqli_query($connect,$query);
           
            if ($result==true){
            echo "<script>window.location.href='?option=khachhang'</script>";
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
      <h2>Thêm Khách hàng</h2>
      
    </div>
    
    
   

<table class="table">
                   
                
                   
                   <tr>
                       <td>Tên Đầy Đủ</td>
                       <td><input required type="text" name="fullname" value=""></td>
                   </tr>
                   <tr>
                       <td>Số Điện Thoại</td>
                       <td><input required type="number" name="phonenumber" value=""></td>
                   </tr>

                   <tr>
                       <td>Địa Chỉ</td>
                       <td><input required type="text" name="address" value=""></td>
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
