<?php
// hiển thị khách hàng
  $query_khachhang = "select * from customer";
  $result_khachhang = mysqli_query($connect,$query_khachhang);
  $dem_khachhang = mysqli_num_rows($result_khachhang);
// hiển thị đơn hàng
  $query_donhang = "select * from orders";
  $result_donhang = mysqli_query($connect,$query_donhang);
  $dem_donhang = mysqli_num_rows($result_donhang);
  //Tính tổng doanh thu
  $tongtienthuduoc = 0;
  foreach($result_donhang as $item){
      $tongtienthuduoc+=$item['tongtienthanhtoan'];
  }


  


  $query_sanpham = "select * from products";
  $result_sanpham= mysqli_query($connect,$query_sanpham);
  $dem_sanpham = mysqli_num_rows($result_sanpham);



?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $dem_donhang?></h3>

                <p>Đơn Hàng Mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?option=donhang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $tongtienthuduoc?></h3>

                <p>Tổng Doanh Thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?option=donhang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $dem_khachhang?></h3>

                <p>Khách Hàng Mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?option=khachhang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $dem_sanpham?></h3>

                <p>Sản Phẩm Trong Kho</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?option=HangLeu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
     
      </div>
<!-- Đơn Hàng-->



    </table>




    </section>
   
  </div>
  


  




  


