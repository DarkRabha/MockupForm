<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;
$nameorganisation = trim(addslashes(strip_tags(htmlspecialchars($_POST['nameorganisation']))));
$natureoforganisation = trim(addslashes(strip_tags(htmlspecialchars($_POST['natureoforganisation']))));
$panno = trim(addslashes(strip_tags(htmlspecialchars($_POST['panno']))));
$gstno = trim(addslashes(strip_tags(htmlspecialchars($_POST['gstno']))));
$goalsandobj = trim(addslashes(strip_tags(htmlspecialchars($_POST['goalsandobj']))));
$dateinc = trim(addslashes(strip_tags(htmlspecialchars($_POST['dateinc']))));
$organisationphno = trim(addslashes(strip_tags(htmlspecialchars($_POST['organisationphno']))));
$membership = trim(addslashes(strip_tags(htmlspecialchars($_POST['membership']))));
$assocmember = trim(addslashes(strip_tags(htmlspecialchars($_POST['assocmember']))));

$q = "INSERT INTO organisation_details (nameorganisation, natureoforganisation, panno, gstno, goalsandobj, dateinc, organisationphno, membership, assocmember) VALUES (:nameorganisation, :natureoforganisation, :panno, :gstno, :goalsandobj, :dateinc, :organisationphno, :membership, :assocmember) ";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':nameorganisation', $nameorganisation, PDO::PARAM_STR);
$stmt->bindParam(':natureoforganisation', $natureoforganisation, PDO::PARAM_STR);
$stmt->bindParam(':panno', $panno, PDO::PARAM_STR);
$stmt->bindParam(':gstno', $gstno, PDO::PARAM_STR);
$stmt->bindParam(':goalsandobj', $goalsandobj, PDO::PARAM_STR);
$stmt->bindParam(':dateinc', $dateinc, PDO::PARAM_STR);
$stmt->bindParam(':organisationphno', $organisationphno, PDO::PARAM_STR);
$stmt->bindParam(':membership', $membership, PDO::PARAM_STR);
$stmt->bindParam(':assocmember', $assocmember, PDO::PARAM_STR);
$stmt->execute();

?>

<?php

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
