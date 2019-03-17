<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$usercategory = trim(addslashes(strip_tags(htmlspecialchars($_POST['usercategory']))));
$useraddress = trim(addslashes(strip_tags(htmlspecialchars($_POST['useraddress']))));
$useradddate = trim(addslashes(strip_tags(htmlspecialchars($_POST['useradddate']))));

$q = "INSERT INTO user_address (usercategory, useraddress, useradddate) VALUES (:usercategory, :useraddress, :useradddate)";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':usercategory', $usercategory, PDO::PARAM_STR);
$stmt->bindParam(':useraddress', $useraddress, PDO::PARAM_STR);
$stmt->bindParam(':useradddate', $useradddate, PDO::PARAM_STR);
$stmt->execute();

?>

<?php

$q1 = "SELECT * FROM user_address";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>

	<div class="container">
		<table class="table table-bordered table-hover table-sm">
			<header><h3>User Address</h3></header>
			<thead>
				<tr>
					<th>SL NO</th>
					<th>USER ID</th>
					<th>Category</th>
					<th>Address</th>
					<th>Date</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while ($r1 = $stmt1->fetchObject())
					{
						?>

						<tr>
							<td><?php echo $e;$e++;; ?></td>
							<td></td>
							<td><?php echo $r1->usercategory; ?></td>
							<td><?php echo $r1->useraddress; ?></td>
							<td><?php echo $r1->useradddate; ?></td>
							<td>
								<a onclick="del2('<?php echo $r1->uadd_id; ?>')">
			 					<button type="button" class="btn btn-dark">Delete</button></a>
			 				</td>
						</tr>

						<?php
					}
					?>
			</tbody>
		</table>
	</div>

	<?php
}

?>
