<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$nameorg = trim(addslashes(strip_tags(htmlspecialchars($_POST['nameorg']))));
$yearjoin = trim(addslashes(strip_tags(htmlspecialchars($_POST['yearjoin']))));
$periodofcon = trim(addslashes(strip_tags(htmlspecialchars($_POST['periodofcon']))));
$yearofterm = trim(addslashes(strip_tags(htmlspecialchars($_POST['yearofterm']))));
$reasonofterm = trim(addslashes(strip_tags(htmlspecialchars($_POST['reasonofterm']))));
$addperiod = trim(addslashes(strip_tags(htmlspecialchars($_POST['moreperiodname']))));
$addposition = trim(addslashes(strip_tags(htmlspecialchars($_POST['morepositionname']))));

$q = "INSERT INTO social_relations (nameorg, yearjoin, periodofcon, yearofterm, reasonofterm, addperiod, addposition) VALUES(:nameorg, :yearjoin, :periodofcon, :yearofterm, :reasonofterm, :addperiod, :addposition)";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':nameorg', $nameorg, PDO::PARAM_STR);
$stmt->bindParam(':yearjoin', $yearjoin, PDO::PARAM_STR);
$stmt->bindParam(':periodofcon', $periodofcon, PDO::PARAM_STR);
$stmt->bindParam(':yearofterm', $yearofterm, PDO::PARAM_STR);
$stmt->bindParam(':reasonofterm', $reasonofterm, PDO::PARAM_STR);
$stmt->bindParam(':addperiod', $addperiod, PDO::PARAM_STR);
$stmt->bindParam(':addposition', $addposition, PDO::PARAM_STR);
$stmt->execute();


?>


<?php

$q1 = "SELECT * FROM social_relations";

$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0)
	{
		?>

		<div class="container">
			<table class="table table-bordered table-hover table-sm">
				<header><h4>Individual Social Details</h4></header>
				<thead>
					<tr>
						<th>SL NO</th>
						<th>User ID</th>
						<th>Name of the Organisation</th>
						<th>Year Of Joining</th>
						<th>Period Of Continuance</th>
						<th>Year Of Termination</th>
						<th>Reason Of Termination</th>
						<th>Period</th>
						<th>Position</th>
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
						<td><?php echo $r1->nameorg; ?></td>
						<td><?php echo $r1->yearjoin; ?></td>
						<td><?php echo $r1->periodofcon; ?></td>
						<td><?php echo $r1->yearofterm; ?></td>
						<td><?php echo $r1->reasonofterm; ?></td>
						<td><?php echo $r1->addperiod; ?></td>
						<td><?php echo $r1->addposition; ?></td>
						<td>
							<a onclick="del1('<?php echo $r1->social_id; ?>')">
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
