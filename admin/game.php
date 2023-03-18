<?php
require('top.inc.php');
isAdmin();
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update game_buy set status='$status' where game_id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from game_buy where game_id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from game_buy";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Buy Games Management</h4>
                        <a class="btn41-43 btn-41" href="manage_game.php">Add New Games</a>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Game Name</th>
                                        <th>Game Link</th>
                                        <th>Price</th>
                                        <th>Genre</th>
                                        <th>Size</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $row['game_id']?></td>
                                        <td><?php echo $row['game_name']?></td>
                                        <?php echo '<td><a href="http://'.$row['link'].'">Link</a></td>'?>
                                        <td><?php echo $row['price']?></td>
                                        <td><?php echo $row['genre']?></td>
                                        <td><?php echo $row['size']?></td>
                                        <td>
                                            <?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['game_id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['game_id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_game.php?id=".$row['game_id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['game_id']."'>Delete</a></span>";
								
								?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>