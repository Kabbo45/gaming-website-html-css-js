<?php
require('top.inc.php');
isAdmin();
$id='';
$name='';
$link='';
$price='';
$genre='';
$size='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from game_buy where game_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
        $id=$row['game_id'];
		$name=$row['game_name'];
        $link=$row['link'];
        $price=$row['price'];
        $genre=$row['genre'];
        $size=$row['size'];
	}else{
		header('location:game.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$id=get_safe_value($con,$_POST['game_id']);
    $name=get_safe_value($con,$_POST['game_name']);
    $link=get_safe_value($con,$_POST['link']);
    $price=get_safe_value($con,$_POST['price']);
    $genre=get_safe_value($con,$_POST['genre']);
    $size=get_safe_value($con,$_POST['size']);
	$res=mysqli_query($con,"select * from game_buy where game_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="GAME ALREADY EXIST";
			}
		}else{
			$msg="GAME ALREADY EXIST";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
            $update_sql="update game_buy set game_name='$name', link='$link', price='$price', genre='$genre', size='$size' where game_id='$id'";
			mysqli_query($con,$update_sql);
		}else{
			mysqli_query($con,"insert into game_buy(game_id, game_name, link, price, genre, size, status) values('$id','$name','$link','$price','$genre','$size', 1)");
		}
		header('location:game.php');
		die();
	}
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Game Add Form</strong> </div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Game ID</label>
                                <input type="text" name="game_id" placeholder="Enter Game ID" class="form-control" required value="<?php echo $id?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Game Name</label>
                                <input type="text" name="game_name" placeholder="Enter Game Name" class="form-control" required value="<?php echo $name?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Link</label>
                                <input type="text" name="link" placeholder="Enter Link" class="form-control" required value="<?php echo $link?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Price</label>
                                <input type="text" name="price" placeholder="Enter Price" class="form-control" required value="<?php echo $price?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Genre</label>
                                <input type="text" name="genre" placeholder="Enter Genre" class="form-control" required value="<?php echo $genre?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Size</label>
                                <input type="text" name="size" placeholder="Enter Size (GB)" class="form-control" required value="<?php echo $size?>">
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