<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e=1;
?>
<?php

			

			//mysql

			$id = $_POST['id'];
			$q2 = "DELETE FROM anonymous_details WHERE anon_id =:id";

			$stmt2 = $core->dbh->prepare($q2);
			$stmt2->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt2->execute(); 

			


		?>

<?php

$q1 = "SELECT * FROM anonymous_details";
$stmt1 = $core->dbh->prepare($q1); 
$stmt1->execute();

if($stmt1->rowCount() > 0)
	{
		?>

		<div class="container">
			<table class="table table-bordered table-hover table-sm">
				<thead>
					<tr>
						<th>SL NO</th>
						<th>User ID</th>
						<th>Field Name</th>
						<th>Value</th>
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
						<td><?php echo $r1->fieldname; ?></td>
						<td><?php echo $r1->fieldvalue; ?></td>
						<td>
							<a onclick="del('<?php echo $r1->anon_id; ?>')">
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

		


	