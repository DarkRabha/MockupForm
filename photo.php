<?php

include('connect.php');

$msg = " ";

$core = core::getInstance();

$e = 1;

$imgFile = $_FILES['userphoto']['name'];
$tmp_dir = $_FILES['userphoto']['tmp_name'];
$imgSize = $_FILES['userphoto']['size'];
$photodate = trim(addslashes(strip_tags(htmlspecialchars($_POST['photodate']))));

 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }

$q = "INSERT INTO user_photo (userphoto, photodate) VALUES (:userphoto, :photodate)";

$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':userphoto', $userphoto, PDO::PARAM_STR);
$stmt->bindParam(':photodate', $photodate, PDO::PARAM_STR);
$stmt->execute();

?>

<?php

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
			 					<button type="button" class="btn btn-info btn-sm">Delete</button></a>
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
