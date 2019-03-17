<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$q1 = "SELECT * FROM organisation_details";

$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0)
	{
		?>

		<div class="container">
			<table class="table table-bordered table-hover table-sm">
				<header><h4>Organisation Details</h4></header>
				<thead>
					<tr>
						<th>SL NO</th>
						<th>User ID</th>
						<th>Name of the Organisation</th>
						<th>Nature of Organisation</th>
						<th>PAN NO</th>
						<th>GST NO</th>
						<th>Goals and Objectives</th>
						<th>Date of Incorporation</th>
						<th>Phone Number</th>
						<th>Membership Strength</th>
						<th>Associated Members</th>
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
						<td><?php echo $r1->nameorganisation; ?></td>
						<td><?php echo $r1->natureoforganisation; ?></td>
						<td><?php echo $r1->panno; ?></td>
						<td><?php echo $r1->gstno; ?></td>
						<td><?php echo $r1->goalsandobj; ?></td>
						<td><?php echo $r1->dateinc; ?></td>
						<td><?php echo $r1->organisationphno; ?></td>
						<td><?php echo $r1->membership; ?></td>
						<td><?php echo $r1->assocmember; ?></td>
						<td>
							<a onclick="del('<?php echo $r1->org_id; ?>')">
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
