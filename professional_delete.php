<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

//mysql

	$pid = $_POST['pid'];
	$q = "DELETE FROM professional_details WHERE pro_id =:id";

	$stmt = $core->dbh->prepare($q);
	$stmt->bindParam(':id', $pid, PDO::PARAM_STR);
	$stmt->execute(); 

?>
<?php
$q1 = "SELECT * FROM professional_details";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>
	<div class="container">
		<header><h4>Professional And Other Courses</h4></header>
		<table class="table table-bordered table-hover table-sm">
			<thead>
				<tr>
					<th>SL NO</th>
					<th>Name of Institution</th>
					<th>Name of Course</th>
					<th>Year of Admission</th>
					<th>Year of Completion</th>
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
							<td><?php echo $r1->nameinst; ?></td>
							<td><?php echo $r1->nameofcourse; ?></td>
							<td><?php echo $r1->yearofadd; ?></td>
							<td><?php echo $r1->yearofcomp; ?></td>
							<td>
								<a onclick="del1('<?php echo $r1->pro_id; ?>')">
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