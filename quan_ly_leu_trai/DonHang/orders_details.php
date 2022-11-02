<?php
if (isset($_GET['x'])) {
    $x = $_GET['x'];

    //a là bảng orders b là bảng order_details c là bảng products d price
    // $query_don_hang="SELECT orders.tien_dat_coc as 'tien_dat_coc',orders.tongtienthanhtoan as 'tien_thanh_toan',products.id as 'id_san_pham', price.price_rent as 'gia',products.images as 'hinhanh' from orders orders join order_details order_details on orders.id = order_details.order_id join products products on order_details.product_id = products.id join price price on products.id = price.product_id where orders.id";


    $query_don_hang = "SELECT a.tien_dat_coc as 'tien_dat_coc',a.tongtienthanhtoan as 'tien_thanh_toan',c.id as 'id_san_pham', d.price_rent as 'gia',c.images as 'hinhanh' from orders a join order_details b on a.id = b.order_id join products c on b.product_id = c.id join price d on c.id = d.product_id where a.id=$x";

    $result_don_hang = mysqli_query($connect, $query_don_hang);
}
if (isset($_GET['id_khach_hang'])) {
    $id_khach_hang = $_GET['id_khach_hang'];
    $query_khach_hang = "select * from customer where id=$id_khach_hang";
    $result_khach_hang = mysqli_query($connect, $query_khach_hang);
    $khach_hang = mysqli_fetch_array($result_khach_hang);
}

if (isset($_GET['id_nhan_vien'])) {
    $id_nhan_vien = $_GET['id_nhan_vien'];
    $query_nhan_vien = "select * from staff where id=$id_nhan_vien";
    $result_nhan_vien = mysqli_query($connect, $query_nhan_vien);
    $nhan_vien = mysqli_fetch_array($result_nhan_vien);
}



?>
<div class="content-wrapper">
    <h1 style="text-align: center;">Chi Tiết Đơn Hàng <br>(Mã Đơn: <?= $x ?>)</h1>
    <h2>Thông Tin Khách Hàng</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID Khách Hàng</th>
            <td><?= $id_khach_hang ?></td>
        </tr>
        <tr>
            <th>Họ Tên</th>
            <td><?= $khach_hang['fullname'] ?></td>
        </tr>
        <tr>
            <th>Số Điện Thoại</th>
            <td><?= $khach_hang['phonenumber'] ?></td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td><?= $khach_hang['address'] ?></td>
        </tr>
        <tr>
            <th>Chứng Minh</th>
            <td><?= $khach_hang['CMND'] ?></td>
        </tr>
    </table>
    <h2>Thông Tin Nhân Viên</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID Nhân Viên</th>
            <td><?= $id_nhan_vien ?></td>
        </tr>
        <tr>
            <th>Họ Tên</th>
            <td><?= $nhan_vien['name'] ?></td>
        </tr>
        <tr>
            <th>Số Điện Thoại</th>
            <td><?= $nhan_vien['phonenumber'] ?></td>
        </tr>

        <tr>
            <th>Chứng Minh</th>
            <td><?= $nhan_vien['CMND'] ?></td>
        </tr>
    </table>
    <h2>Thông Tin Thuê</h2>
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>ID Sản Phẩm</th>
            <th>Hình Ảnh</th>


            <th>Giá</th>
        </tr>
        <?php $stt = 1;
       $item = mysqli_fetch_assoc($result_don_hang);

        ?>
            <tr>
                <th><?= $stt++ ?></th>
                <th><?= $item['id_san_pham'] ?></th>
                <th><img width="70" src="./dist/img/<?= $item['hinhanh'] ?>" alt=""></th>



                <th><?= $item['gia'] ?></th>
            </tr>
            <?php $tien_dat_coc = $item['tien_dat_coc'] ?>
            <?php $tien_thanh_toan = $item['tien_thanh_toan'] ?>
            <?php
            if ($tien_dat_coc > $tien_thanh_toan) {
                $tien_du = $tien_dat_coc - $tien_thanh_toan;
            } else {
                $tien_du = 0;
            }

            if ($tien_thanh_toan > $tien_dat_coc) {
                $tien_thieu = $tien_thanh_toan - $tien_dat_coc;
            } else {
                $tien_thieu = 0;
            }
            ?>
       

        <tr>
            <td colspan="3">Số Tiền Đặt Cọc</td>
            <td><?= number_format($tien_dat_coc, 0, '.', ',') ?></td>
        </tr>
        <tr>
            <td colspan="3">Tổng Tiền Phải Trả</td>
            <td><?= number_format($tien_thanh_toan, 0, '.', ',') ?></td>
        </tr>
        <tr>
            <td colspan="3">Số Tiền Khách Dư</td>
            <td><?= number_format($tien_du, 0, '.', ',') ?></td>
        </tr>
        <tr>
            <td colspan="3">Số Tiền Khách Nợ</td>
            <td><?= number_format($tien_thieu, 0, '.', ',') ?></td>
        </tr>
    </table>
</div>