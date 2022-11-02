


<div class="content-wrapper">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h2>Thêm Đơn Hàng</h2>
      
    </div>
    
    
                <table class="table">
                    
                                <label>Nhân Viên</label>
                <select class="custom-select" name="id_staff" >
                                        <?php
//hiện nhân viên
                                        $sql2 = "SELECT * FROM `staff` where Role_id=2 ";
                                        $result2 = mysqli_query($connect, $sql2) or die("Câu truy vấn sai");

                                        while ($row2 = mysqli_fetch_assoc($result2)) {

                                        ?>
                                            <option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
                                        <?php } ?>
                </select><br>
               

                <label>Khách hàng</label>
                <select class="custom-select" name="id_customer" >
                                        <?php
//hiện khách hàng
                                        $sql3 = "SELECT * FROM `customer`  ";
                                        $result3 = mysqli_query($connect, $sql3) or die("Câu truy vấn sai");

                                        while ($row3 = mysqli_fetch_assoc($result3)) {

                                        ?>
                                            <option value="<?php echo $row3['id'] ?>"><?php echo $row3['fullname'] ?></option>
                                        <?php } ?>
                </select>

                <label>Sản phẩm</label>
                <select class="custom-select" name="product_id" >
                                        <?php
//hiện sản phẩm
                                        $sql4 = "SELECT * FROM `products`  ";
                                        $result4 = mysqli_query($connect, $sql4) or die("Câu truy vấn sai");

                                        while ($row4 = mysqli_fetch_assoc($result4)) {

                                        ?>
                                            <option value="<?php echo $row4['id'] ?>"><?php echo $row4['title'] ?></option>
                                        <?php } ?>
                </select>
                                      

                   <tr>
                       <td>Tiền đặt cọc</td>
                       <td><input required type="number" name="tien_dat_coc" value=""></td>
                   </tr>
                   
                   
                 
                   <tr>
                       
                       <td>Ngày bắt đầu </td>
                       <td><input required type="date" id="tg1" min="<?php $today = getdate();
                                                                                                                                                                                            $ngay = $today["mday"];
                                                                                                                                                                                            $thang  = $today["mon"];
                                                                                                                                                                                            $nam = $today["year"];
                                                                                                                                                                                            if ($ngay < 10) {
                                                                                                                                                                                                $ngay = "0" . $ngay;
                                                                                                                                                                                            }
                                                                                                                                                                                            if ($thang < 10) {
                                                                                                                                                                                                $thang = "0" . $thang;
                                                                                                                                                                                            }
                                                                                                                                                                                            $tgbatdau = $nam . "-" . $thang . "-" . $ngay;
                                                                                                                                                                                            echo $tgbatdau; ?>" max="<?php $dateint = mktime(0, 0, 0, $thang, ($ngay + 30), $nam);
                                                                                                                                                                                                                        $gioihanngay = date('Y-m-d', $dateint);
                                                                                                                                                                                                                        echo $gioihanngay; ?>" onchange="settime()" name="time_start" value=""></td>
                       
                   </tr>   

                   <tr>
                       
                       <td>Ngày Kết Thúc</td>
                       <td><input required type="date" id="tg2"  max="<?php $dateint2 = mktime(0, 0, 0, $thang, ($ngay + 365), $nam);
                                                                                                                                                                                                        $gioihanngayketthuc = date('Y-m-d', $dateint2);
                                                                                                                                                                                                        echo $gioihanngayketthuc; ?>" onchange="settime()" name="time_end" value=""></td>
                       
                   </tr>   
                   <tr>
                    <td>Số lượng</td>
                    <td>
                        <input type="text" name="sl" required>
                    </td>
                   </tr>
                   <!-- <tr>
                       
                       <td>tổng tiền thanh toán </td>
                       <td><input required type="number" name="tongtienthanhtoan" value=""></td>
                       
                   </tr>     -->
                   <!-- <tr>
                       echo $thoigian
                       <td>SỐ Ngày</td>
                       <td><input required type="text" name="time" value=""></td>
                       
                   </tr>    -->

                  
                   <tr>

                       <td><button class="btn btn-outline-warning" type="submit" name="click">Thêm</button></td>
                   </tr>
                   <?php
                        if(isset($_POST['click'])){
                        
                            $id_staff= $_POST['id_staff'];
                            $id_customer = $_POST['id_customer'];
                            $tien_dat_coc = $_POST['tien_dat_coc'];
                            $tongtienthanhtoan = $_POST['tongtienthanhtoan'];
                            $num = $_POST['sl'];
                            $product_id = $_POST['product_id'];
                            //strtotime
                            $time_start=$_POST['time_start'];
                            $time_end= $_POST['time_end'];
                            $thoigian = ($time_end - $time_start)/86400;
                            $select_tien= "SELECT price from products where id = $product_id";
                            $tien_result = mysqli_query($connect, $select_tien);
                            $row5 = mysqli_fetch_assoc($tien_result);
                            $tien = $row5['price'];
                            $tinhtien = $thoigian * $tien * $num;
                             
                        
                            if(  $id_staff == '' || $id_customer=='' ||  $tien_dat_coc=='' || $tongtienthanhtoan=''  ){
                                $thongbao = "Hãy nhập đầy đủ tất cả thông tin";
                            } 
                            else {    
                                $query="insert orders(id_staff, id_customer,tien_dat_coc,tongtienthanhtoan,time_start,time_end,soluong) values('$id_staff','$id_customer','$tien_dat_coc','$tinhtien','$time_start','$time_end','$num')";
                                $result = $connect->query($query);
                                if ($result==true){
                                echo "<script>window.location.href='?option=donhang'</script>";
                                }
                                else{
                                    echo "<script>alert('Thêm Không Thành Công')</script>";
                                }
                            
                            }
                            
                            $query_id_order = "SELECT id from orders order by id DESC limit 1";
                            $result_id = mysqli_query($connect, $query_id_order);
                            
                            $id_orders = mysqli_fetch_array($result_id);
                            $result_id_hoa_don = $id_orders['id'];

                            $insert_orders_detail = "insert order_details(order_id, product_id, num) values('$result_id_hoa_don','$product_id','$num')";
                            $result_order_details =  mysqli_query($connect, $insert_orders_detail);

                        
                        }
                        //tính ngày ra tổng tiền 
                    
                    
                    ?>
               </table>
            
  </form>

</div>

<script>
        function settime() {
            let domain = document.getElementById('tg1').value;

            document.getElementById('tg2').min = domain;

            document.getElementById("tg2").disabled = false;

            let tg2 = document.getElementById('tg2').value;
            if (tg2 != "") {
                tongngay();
            }

        }
   
      
  
        function tongngay() {

            let d1 = document.getElementById('tg1').value;
            let d2 = document.getElementById('tg2').value;

            let birthday = new Date(d1);
            let dead = new Date(d2);
            let ms1 = birthday.getTime();
            let ms2 = dead.getTime();
            let k1 = Math.ceil((ms2 - ms1) / (24 * 60 * 60 * 1000));
            let k2 = k1 + 1;

            document.getElementById('tongngay').value = k2;





            // let ms1 = d1.getTime();
            // let ms2 = d2.getTime();
            // let k1 = Math.ceil((ms2 - ms1) / (24*60*60*1000));

            //document.getElementById('kq2').value = d2;



        }
    </script>


