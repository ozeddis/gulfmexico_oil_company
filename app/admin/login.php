<?php
	include "header.php";
?>
<?php
	if(isset($_POST['log_btn'])){
		$email2 = strtoupper(htmlentities(trim(mysqli_real_escape_string($connection, $_POST['email']))));
		$password2 = md5(sha1($_POST['password']));
		$reg_date = Date("d-M-Y");
		
		$query = "SELECT * FROM admin WHERE email = '{$email2}' AND password = '{$password2}'";
		$query_run = mysqli_query($connection, $query);

		if(mysqli_num_rows($query_run) > 0){
			while($result = mysqli_fetch_assoc($query_run)){
				$id = $result['id'];
				
				$_SESSION['admin_id'] = $id;
				header("location: admin_page.php");
			}
		}else{
			echo "<script type=\"text/javascript\">
					alert(\"incorrect email and password combination\");
					window.location = \"login\"
					</script>";
		}
	}
?>
<body>
    <section class="container-pages">
        <div class="card pages-card col-lg-4 col-md-6 col-sm-6">
            <div class="card-body ">
				<div class="row">
					<div class="col-md-4">
				
					</div>
					<div class="col-md-4 text-center">
						<a href="https://gulfmexicooffshore.comp"><img src="https://gulfmexicooffshore.com/wp-content/uploads/2021/11/gulf.png" alt="" class="img-responsive" width="100px"></a>
					</div>
					<div class="col-md-4">
				
					</div>
				</div><br>
                <div class="small text-center text-dark"> Login to Admin </div>
               
                    <form action="" method="POST" >
                        <div class="form-group">
                            <div class="input-group">
                                 <span class="input-group-addon text-theme"><i class="fa fa-user"></i> 
                                </span>
                                <input type="text" name="email" class="form-control" placeholder="Enter Account Email Address">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon text-theme"><i class="fa fa-asterisk"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Enter Account Password">

                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <button type="submit" class="btn  btn-theme login-btn " name="log_btn">   Login   </button>
                        </div>
                    </form>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </section>