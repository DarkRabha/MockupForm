<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;


$q1 = "SELECT * FROM awards_details";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>
	<div class="container">
		<header><h4>Awards and Achievements</h4></header>
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>SL NO</th>
					<th>User ID</th>
					<th>Name of Award</th>
					<th>Purpose for Award</th>
					<th>Date of Award</th>
					<th>Rewarding Organisation</th>
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
							<td><?php echo $r1->nameofaward; ?></td>
							<td><?php echo $r1->purposeforaward; ?></td>
							<td><?php echo $r1->dateaward; ?></td>
							<td><?php echo $r1->rewardorg; ?></td>
							<td>
								<a onclick="del2('<?php echo $r1->aw_id; ?>')">
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