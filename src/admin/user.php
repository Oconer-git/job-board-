<?php
require('header.php');
require('config.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=mysqli_real_escape_string($conn,$_GET['type']);
	if($type=='delete'){
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$delete_sql="DELETE from user_form where id = '$id'";
		mysqli_query($conn, $delete_sql);
	}
}

$sql="SELECT * from user_form";
$res=mysqli_query($conn, $sql);
?>
<section>
				<div class="container">
					<div class="card">
						<div class="card-body">
						<h4 class="box-title">Users</h4>
						</div>
							<table class="table ">
								<thead>
									<tr>
									<th width="2%">ID</th>
									<th width="20%">Lastname</th>
									<th width="20%">Firstname</th>
									<th width="20%">Middlename</th>
									<th width="20%">Gender</th>
									<th width="20%">Phonenumber</th>
									<th width="20%">Username</th>
									<th width="20%">Email</th>
									<th width="26%"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
									<td><?php echo $row['id']?></td>
									<td><?php echo $row['lastName']?></td>
									<td><?php echo $row['firstName']?></td>
									<td><?php echo $row['middleName']?></td>
									<td><?php echo $row['gender']?></td>
									<td><?php echo $row['phoneNumber']?></td>
									<td><?php echo $row['username']?></td>
									<td><?php echo $row['email']?></td>
									<td>
									<?php
										
										echo "<span class='badge badge-edit'><a href='updateprof.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
										
										echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."' onClick=\"javascript: return confirm('Please confirm deletion');\">Delete</a></span>";
										
										?>
									</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
					</div>
				</div>
</section>
<?php require('footer.php'); ?>