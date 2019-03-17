<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e=1;
$nameofplace = trim(addslashes(strip_tags(htmlspecialchars($_POST['nameofplace']))));
$yearoftravel = trim(addslashes(strip_tags(htmlspecialchars($_POST['yearoftravel']))));
$purposeoftravel = trim(addslashes(strip_tags(htmlspecialchars($_POST['purposeoftravel']))));
$modeoftravel = trim(addslashes(strip_tags(htmlspecialchars($_POST['modeoftravel']))));
$note = trim(addslashes(strip_tags(htmlspecialchars($_POST['note']))));

$q = "INSERT INTO travel_details (nameofplace, yearoftravel, purposeoftravel, modeoftravel, note) VALUES (:nameofplace, :yearoftravel, :purposeoftravel, :modeoftravel, :note)";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':nameofplace', $nameofplace, PDO::PARAM_STR);
$stmt->bindParam(':yearoftravel', $yearoftravel, PDO::PARAM_STR);
$stmt->bindParam(':purposeoftravel', $purposeoftravel, PDO::PARAM_STR);
$stmt->bindParam(':modeoftravel', $modeoftravel, PDO::PARAM_STR);
$stmt->bindParam(':note', $note, PDO::PARAM_STR);
$stmt->execute();

?>

<?php

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

		