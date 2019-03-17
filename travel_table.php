<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e=1;
$q1 = "SELECT * FROM travel_details";
$stmt1 = $core->dbh->prepare($q1); 
$stmt1->execute();

if($stmt1->rowCount() > 0)
	{
		?>

		<div class="container">
			<table class="table table=bordered table-hover table-sm">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>User ID</th>
						<th>Name Of Place</th>
						<th>Year Of Travelling</th>
						<th>Purpose Of Travelling</th>
						<th>Mode Of Travelling</th>
						<th>Note</th>
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
						<td><?php echo $r1->nameofplace; ?></td>
						<td><?php echo $r1->yearoftravel; ?></td>
						<td><?php echo $r1->purposeoftravel; ?></td>
						<td><?php echo $r1->modeoftravel; ?></td>
						<td><?php echo $r1->note; ?></td>
						<td>
							<a onclick="del('<?php echo $r1->travel_id; ?>')">
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
		