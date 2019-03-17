<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$school = trim(addslashes(strip_tags(htmlspecialchars($_POST['moreschool']))));
$hs = trim(addslashes(strip_tags(htmlspecialchars($_POST['hs']))));
$graduation = trim(addslashes(strip_tags(htmlspecialchars($_POST['moregraduation']))));
$postgraduation = trim(addslashes(strip_tags(htmlspecialchars($_POST['morepostgraduation']))));

$q = "INSERT INTO education_details (school, hs, graduation, postgraduation) VALUES(:school, :hs, :graduation, :postgraduation)";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':school', $school, PDO::PARAM_STR);
$stmt->bindParam(':hs', $hs, PDO::PARAM_STR);
$stmt->bindParam(':graduation', $graduation, PDO::PARAM_STR);
$stmt->bindParam(':postgraduation', $postgraduation, PDO::PARAM_STR);
$stmt->execute();

?>

<?php

$q1 = "SELECT * FROM education_details";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>
	<div class="container">
		<header><h4>Education Details</h4></header>
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>SL NO</th>
					<th>School</th>
					<th>HS</th>
					<th>Graduation</th>
					<th>Post Graduation</th>
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
							<td><?php echo $r1->school; ?></td>
							<td><?php echo $r1->hs; ?></td>
							<td><?php echo $r1->graduation; ?></td>
							<td><?php echo $r1->postgraduation; ?></td>
							<td>
								<a onclick="del('<?php echo $r1->e_id; ?>')">
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