<style>
    table tr td input{
        margin-left: 5px;
        width: 100%;
    }
    .cart-content-right-button button:first-child a{
        background-color: #fff;

    }
    .cart-content-right-button button:first-child:hover a{
        background-color: #ddd;
    }
    .cart-content-right-button button:last-child a{
        background-color: black;
        color: #fff;
    }
    .cart-content-right-button button:last-child:hover a{
        background-color: #dddddd;
        color: black;
    }

</style>

<div class="content-wrapper">
  <div class="container">
        <div class="cart-content row">
                        
            <div class="cart-content-left">
                        <?php
                            if(isset($_SESSION['cart'])):
                                //$ids="0";
                                //foreach(array_keys($_SESSION['cart']) as $key)
                                //$ids.=",".$key;

                                //cần 2 đối số thứu nhất là dấu phẩy để phân cách giwuax các phần từ giữa mảng
                                //thứu 2 là mảng là t lấy
                                $ids = implode(',', array_keys($_SESSION['cart']));
                                //$query="select * from products where id in($ids)";
                                $query = "select * from products where id in($ids)";
                                $result = mysqli_query($connect, $query);
                                //$result=$connect->query("select * from products where id in($ids)");
                        ?>
                        <table>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>TÊN SẢN PHẨM</th>
                                
                                <th>SL</th>
                                <th>HOẠT ĐỘNG</th>
                            </tr>
                            <?php
                                $tongtiengiohang=0;
                                $tongsanphamgiohang=0;
                                foreach($result as $item):
                            ?>
                            <tr>

                                <td>
                                    <img src = "./dist/img/<?= $item['images']?>">
                                </td>
                                <td>
                                    <p><?= $item['title']?></p>
                                </td>
                                <td>
                                    <?=$tongsanpham=$_SESSION['cart'][$item['id']]?>
                                    
                                </td>
                                
                                <td>
                                    <input type="button" value = "X" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';">
                                </td>

                            </tr>
                        
                            <?php
                                endforeach;
                            ?>

                        </table>
                        <?php
                            endif;
                        ?>
                    <div class="cart-content-right-button">
                        <button><a href="?option=themdon">TIẾP TỤC MUA SẮM</a></button>
                        <button><a href="?option=cart&action=order">THANH TOÁN</a></button>
                    </div>
                    <?php
                //gán biết cart cho cái mảng
                if(empty($_SESSION['cart'])){
                    $_SESSION['cart']=array();
                }
                if(isset($_GET['action'])){
                    $id=$_GET['id'];
                    switch($_GET['action']){
                        case'add':

                          if(array_key_exists($id, array_keys($_SESSION['cart']))){
                            $_SESSION['cart'][$id]++;
                          }
                          else{
                            $_SESSION['cart'][$id]=1;
                          }
                          //khi thực hiện xong thì trả về option cart để khi f5 k bị tăng giá trị lên
                          echo "<script>window.location.href='?option=cart'</script>";
                          break;

                            //nếu chưa có mã sản phẩm r thì cộng thêm 1 đơn vị không thì gán bằng 1

                        case'delete':
                            unset($_SESSION['cart'][$id]);
                            break;
                        case'update':
                            if($_GET['type'] == 'asc'){
                                $query_so_luong_sp = "select soluong_conlai from xe  where id = $id";
                                $result_so_luong_sp = mysqli_query($connect, $query_so_luong_sp);
                                $so_luong_con = mysqli_fetch_array($result_so_luong_sp)['soluong_conlai'];
                                if($so_luong_con > $tongsanpham){
                                  $_SESSION['cart'][$id]++;
                                }
                                else{
                                  $tongsanpham = $tongsanpham;
                                  echo "<script>alert('Tổng sản phẩm trong khi chỉ còn $tongsanpham')</script>";
                                }
                                echo "<script>window.location.href='?option=cart'</script>";
                            }
                            else{
                                if($_SESSION['cart'][$id]>1){
                                    $_SESSION['cart'][$id]--;
                                    echo "<script>window.location.href='?option=cart'</script>";
                                }
                                else{
                                  echo "<script>alert('Vui lòng chọn số lượng lớn hơn hoặc bằng 1')</script>";
                                }
                            }
                            break;
                        case'order':
                            echo "<script>window.location.href='?option=order'</script>";
                            break;
                    }
                }
            ?>
            
            </div>
        </div>
    </div>
</div>
