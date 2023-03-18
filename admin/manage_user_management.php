<?php
require('top.inc.php');
isAdmin();
$name='';
$password='';
$email='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from user where email='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
        $name=$row['name'];
        $password=$row['password'];
        $email=$row['email'];
	}else{
		header('location:user_management.php');
		die();
	}
}

if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $password=get_safe_value($con,$_POST['password']);
    $email=get_safe_value($con,$_POST['email']);
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['email']){
			
			}else{
				$msg="Email already exist!";
			}
		}else{
			$msg="Email already exist";
		}
	}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update user set name='$name', password='$password', email='$email' where email='$email'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into user(name, password, email, code, status, admin_control) values('$name','$password'','$email', 0, verified, 0)");
		}
		header('location:user_management.php');
		die();
	}
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>New User Form</strong><small> </small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">

                            <div class="form-group">
                                <label for="username" class=" form-control-label">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" class="form-control" required value="<?php echo $name?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Password</label>
                                <input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
                            </div>

                            <div class="form-group">
                                <label for="password" class=" form-control-label">Email</label>
                                <input type="email" name="email" placeholder="Enter email" class="form-control" required value="<?php echo $email?>">
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>