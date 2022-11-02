<?php
    session_start();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="./cssLogin//login.css">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-summer-camp-tent-tent-cartoon-small-scene-simple-camppitch-a-tentcartoonsmall-png-image_4083711.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" name="button" class="btn login_btn" value="Login">
                        </div>
                        <?php
                            $connect= mysqli_connect("localhost","root","","quanlyleutrai");
                            if(isset($_POST['button'])){
                                if(isset($_POST['username']) && isset($_POST['password'])){
                                    $username=$_POST['username'];
                                    $password=$_POST['password'];
                                    if($username=='' || $password==''){
                                        echo   "<label>Hãy nhập đầy đủ tài khoản và mật khẩu!!!</label>";
                                         return;
                                    }
                                    else
                                    {
                                    $sql="SELECT * from staff where username='$username' and Role_id=1 ";
                                    $result=mysqli_query($connect,$sql) or die ('Câu truy vấn sai');
                                    $dem=mysqli_num_rows($result);
                                    if($dem==0)
                                    {
                                        echo "<label>Tài khoản không tồn tại</label>";
                                       return;
                                    }
                                    else{
                                        $row=mysqli_fetch_assoc($result);
                                            if($password==$row['password']){
                                                $_SESSION['ID']=$_POST['username'];
                                                echo "<label>Đăng nhập thành công</label>";
                                                header("Location: index.php");
                                            }
                                            else{
                                                echo "<label>Mật khẩu bạn đã nhập không chính xác. <a href='#'>Quên mật khẩu?</a> <br></label>";
                                                ?>
                            
                            <?php 
                                            }
                                          }
                                        
                                       }   
                                    }
                                  
                                
                            }
                        ?>
				
                    </form>
                    
                   	
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
