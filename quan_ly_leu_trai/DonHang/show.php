<?php 
    $query="SELECT * from orders";
    $result = mysqli_query($connect,$query);
?>
<!--  -->
<div class="content-wrapper">
<div class="row container d-flex justify-content-center" style="margin-top: 1.5cm;margin-bottom: -14px;">
                <div class="col-lg-12 grid-margin stretch-card" style="margin-left: 5cm;">
                    <div class="card" style="background-color: rgb(23,162,184); color: #ffff ;">
                        <div class="card-body">
                            <H1 class="card-title" style="font-weight: bold;">Danh Sách Đơn Hàng</H1>
                            <p class="card-description">
                            </p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">

                        <div class="col-lg-12 grid-margin stretch-card" style="margin-left: 5cm;">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-description">

                                    </p>
                                    <div class="table-responsive">
    
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>STT</th>
              
              <th>Id đơn hàng</th>
              <th>tên nhân viên</th>
              <th>tên khách hàng</th>
             <th>Ngày bắt đầu</th>
             <th>Ngày kết thúc</th>
             <th>số lượng</th>
             <th>Sản phẩm</th>
              <th>chi tiết</th>
              <!-- <th>Xóa</th> -->
             
              
          </tr>
       
      </thead>
      <?php $STT=1; foreach($result as $item){
            $query_nhanvien="select * from staff where id=".$item['id_staff'];
            $result_nhanvien=mysqli_query($connect,$query_nhanvien);
            $ten_nhanvien=mysqli_fetch_array($result_nhanvien);
            // khách hàng
            $query_khachhang="select * from customer where id=".$item['id_customer'];
            $result_khachhang=mysqli_query($connect,$query_khachhang);
            $ten_khachhang=mysqli_fetch_array($result_khachhang);
       
            // $query_product="select * from products where id=".$item['id'];
            // $result_hoa_don=mysqli_query($connect,$query_product);
            // $ten_hoa_Don=mysqli_fetch_array($result_sp);

            $query_chi_tiet="select * from order_details where order_id=".$item['id'];
            $result_chi_tiet = mysqli_query($connect, $query_chi_tiet);
            $id_product = mysqli_fetch_array($result_chi_tiet);
        $id_products = $id_product['product_id'];

           $query_product="select * from products where id=$id_products";
            $result_sp=mysqli_query($connect,$query_product);
            $ten_sanpham=mysqli_fetch_array($result_sp);
          


            ?>
          <tr>
              <th><?= $STT++?></th>
              
              <th><?= $item['id']?></th>
              <th><?=  $ten_nhanvien['name']?></th>
              <th><?= $ten_khachhang['fullname']?></th>
             <th><?= $item['time_start']?></th>
             <th><?= $item['time_end']?></th>
             <th><?= $item['soluong']?></th>
             <th><?= $ten_sanpham['title']?></th>
              <th><a class="btn btn-success" href="?option=donhang_detail&x=<?= $item['id']?>&id_khach_hang=<?= $item['id_customer']?>&id_nhan_vien=<?= $item['id_staff']?>">Chi Tiết</a></th>
             <!-- <th><a class="btn btn-success" href="?option=donhang&id=<?= $item['id']?>">Xóa</a></th> -->
              
          </tr>
          <?php } ?>
    </table>
    <a  class="btn btn-success" href="?option=Add_order"> Thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

</div>

