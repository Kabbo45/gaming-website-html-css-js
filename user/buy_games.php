<?php
require('top.inc.php');
$sql="select * from game_buy where status = 0";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Buy Games</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="50%">Name</th>
                                        <th width="10%">Genre</th>
                                        <th width="10%">Size</th>
                                        <th width="10%">Price (BDT)</th>
                                        <th width="5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td><?php echo $row['game_id']?></td>
                                        <td><?php echo $row['game_name']?></td>
                                        <td><?php echo $row['genre']?></td>
                                        <td><?php echo $row['size']?></td>
                                        <td><?php echo $row['price']?></td>
                                        <?php echo '<td><span class="badge badge-pending"><a href="http://'.$row['link'].'">Buy</a></span></td>'?>
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