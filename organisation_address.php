<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$category = trim(addslashes(strip_tags(htmlspecialchars($_POST['category']))));
$orgaddress = trim(addslashes(strip_tags(htmlspecialchars($_POST['orgaddress']))));
$orgdate = trim(addslashes(strip_tags(htmlspecialchars($_POST['orgdate']))));

$q = "INSERT INTO organisation_address (category, orgaddress, orgdate) VALUES(:category, :orgaddress, :orgdate)";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':orgaddress', $orgaddress, PDO::PARAM_STR);
$stmt->bindParam(':orgdate', $orgdate, PDO::PARAM_STR);
$stmt->execute();

?>

<?php

$q1 = "SELECT * FROM organisation_address";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>
	<div class="container">
		<header><h4>Organisation Address</h4></header>
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>SL NO</th>
					<th>User ID</th>
					<th>Category</th>
					<th>Organisation Address</th>
					<th>Date</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					while($r1 = $stmt1->fetchObject())
					{
						?>
						<tr>
							<td><?php echo $e;$e++;; ?></td>
							<td></td>
							<td><?php echo $r1->category; ?></td>
							<td><?php echo $r1->orgaddress; ?></td>
							<td><?php echo $r1->orgdate; ?></td>
							<td>
								<a onclick="del2('<?php echo $r1->add_id; ?>')">
			 				<button type="button" class="btn btn-dark btn-sm">Delete</button></a>
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