<?php

include('connect.php');
$msg = " ";

$core = core::getInstance();

$e = 1;


			//mysql

			$id = $_POST['id'];
			$q2 = "DELETE FROM personal_details WHERE p_id =:id";

			$stmt2 = $core->dbh->prepare($q2);
			$stmt2->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt2->execute(); 


?>
<?php
$q1 = "SELECT * FROM personal_details";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>

	<div class="container">
		<table class="table table-bordered table-hover table-sm">
			<header><h3>Personal Details</h3></header>
			<thead>
				<tr>
					<th>SL NO</th>
					<th>USER ID</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Gender</th>
					<th>Religion</th>
					<th>Mother Tongue</th>
					<th>Languages Known</th>
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
							<td><?php echo $r1->userid; ?></td>
							<td><?php echo $r1->username; ?></td>
							<td><?php echo $r1->phno; ?></td>
							<td><?php echo $r1->gender; ?></td>
							<td><?php echo $r1->religion; ?></td>
							<td><?php echo $r1->mothertongue; ?></td>
							<td><?php echo $r1->languagesknown; ?></td>
							<td>
								<a onclick="del('<?php echo $r1->p_id; ?>')">
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