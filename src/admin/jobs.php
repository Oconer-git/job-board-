<?php
require('header.php');
require('config.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=mysqli_real_escape_string($conn,$_GET['type']);
	if($type=='delete'){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$delete_sql="DELETE from jobopening where id = '$id'";
		mysqli_query($conn, $delete_sql);
	}
}

$sql="SELECT * from jobopening";
$res=mysqli_query($conn, $sql);
?>
<section>
    <div class="content pb-0">
        <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="box-title">Job Opening</h4>
                    </div>
                    <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                <th width="2%">ID</th>
                                <th width="20%">Business</th>
                                <th width="20%">Job</th>
                                <th width="20%">Contact Person</th>
                                <th width="20%">Contact Number</th>
                                <th width="2%">Address</th>
                                <th width="2%">Location</th>
                                <th width="2%">Salary</th>
                                <th width="2%">Sex</th>
                                <th width="2%">Contractual</th>
                                <th width="2%">Uploaded By</th>
                                <th width="26%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                while($row=mysqli_fetch_assoc($res)){?>
                                <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['business']?></td>
                                <td><?php echo $row['job']?></td>
                                <td><?php echo $row['contact_person']?></td>
                                <td><?php echo $row['contact_number']?></td>
                                <td><?php echo $row['address']?></td>
                                <td><?php echo $row['location']?></td>
                                <td><?php echo $row['salary']?></td>
                                <td><?php echo $row['sex']?></td>
                                <td><?php echo $row['contractual']?></td>
                                <td><?php echo $row['uploadedBy']?></td>
                                <td>
                                    <?php
                                    echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."' onClick=\"javascript: return confirm('Please confirm deletion');\">Delete</a></span>";
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
</section>
<?php require('footer.php'); ?>






