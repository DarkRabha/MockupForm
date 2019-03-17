<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$q1 = "SELECT * FROM user_photo";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>

	<div class="container">
		<table class="table table-bordered table-hover table-sm">
			<header><h3>User Photo</h3></header>
			<thead>
				<tr>
					<th>SL NO</th>
					<th>USER ID</th>
					<th>Photo</th>
					<th>Photo Date</th>
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
							<td><?php echo $r1->userphoto; ?></td>
							<td><?php echo $r1->photodate; ?></td>
							<td>
								<a onclick="del1('<?php echo $r1->ph_id; ?>')">
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
