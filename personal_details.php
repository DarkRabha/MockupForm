<?php

include('connect.php');
$msg = " ";

$core = core::getInstance();

$e = 1;

$userid = trim(addslashes(strip_tags(htmlspecialchars($_POST['userid']))));
$username = trim(addslashes(strip_tags(htmlspecialchars($_POST['username']))));
$userknownname = trim(addslashes(strip_tags(htmlspecialchars($_POST['moreusername']))));
$userdate = trim(addslashes(strip_tags(htmlspecialchars($_POST['userdate']))));
$city = trim(addslashes(strip_tags(htmlspecialchars($_POST['city']))));
$state = trim(addslashes(strip_tags(htmlspecialchars($_POST['state']))));
$country = trim(addslashes(strip_tags(htmlspecialchars($_POST['country']))));
$phno = trim(addslashes(strip_tags(htmlspecialchars($_POST['phno']))));
$height = trim(addslashes(strip_tags(htmlspecialchars($_POST['height']))));
$dheight = trim(addslashes(strip_tags(htmlspecialchars($_POST['dheight']))));
$weight = trim(addslashes(strip_tags(htmlspecialchars($_POST['weight']))));
$dweight = trim(addslashes(strip_tags(htmlspecialchars($_POST['dweight']))));
$emailadd = trim(addslashes(strip_tags(htmlspecialchars($_POST['moreemail']))));
$dob = trim(addslashes(strip_tags(htmlspecialchars($_POST['dob']))));
$pob = trim(addslashes(strip_tags(htmlspecialchars($_POST['pob']))));
$gender = trim(addslashes(strip_tags(htmlspecialchars($_POST['gender']))));
$mothername = trim(addslashes(strip_tags(htmlspecialchars($_POST['mothername']))));
$motherknownname = trim(addslashes(strip_tags(htmlspecialchars($_POST['moremothername']))));
$fathername = trim(addslashes(strip_tags(htmlspecialchars($_POST['fathername']))));
$fatherknownname = trim(addslashes(strip_tags(htmlspecialchars($_POST['morefathername']))));
$nameofrel = trim(addslashes(strip_tags(htmlspecialchars($_POST['nameofrel']))));
$indiname = trim(addslashes(strip_tags(htmlspecialchars($_POST['indiname']))));
$brothername = trim(addslashes(strip_tags(htmlspecialchars($_POST['morebrothername']))));
$brotherknownname = trim(addslashes(strip_tags(htmlspecialchars($_POST['morebrotherkname']))));
$sistername = trim(addslashes(strip_tags(htmlspecialchars($_POST['moresistername']))));
$sisterknownname = trim(addslashes(strip_tags(htmlspecialchars($_POST['moresisterkname']))));
$religion = trim(addslashes(strip_tags(htmlspecialchars($_POST['religion']))));
$caste = trim(addslashes(strip_tags(htmlspecialchars($_POST['caste']))));
$subcaste = trim(addslashes(strip_tags(htmlspecialchars($_POST['moresubcaste']))));
$mothertongue = trim(addslashes(strip_tags(htmlspecialchars($_POST['mothertongue']))));
$languagesknown = trim(addslashes(strip_tags(htmlspecialchars($_POST['morelanguagesknown']))));
$buss_emp = trim(addslashes(strip_tags(htmlspecialchars($_POST['morebussemp']))));
$hobby = trim(addslashes(strip_tags(htmlspecialchars($_POST['hobby']))));
$favouritecolour = trim(addslashes(strip_tags(htmlspecialchars($_POST['favouritecolour']))));
$favouritefood = trim(addslashes(strip_tags(htmlspecialchars($_POST['favouritefood']))));
$extracir = trim(addslashes(strip_tags(htmlspecialchars($_POST['extracir']))));

$q = "INSERT INTO personal_details (userid, username, userknownname, userdate, city, state, country, phno, height, dheight, weight, dweight, emailadd, dob, pob, gender, mothername, motherknownname, fathername, fatherknownname, nameofrel, indiname, brothername, brotherknownname, sistername, sisterknownname, religion, caste, subcaste, mothertongue, languagesknown, buss_emp, hobby, favouritecolour, favouritefood, extracir) VALUES(:userid, :username, :userknownname, :userdate, :city, :state, :country, :phno, :height, :dheight, :weight, :dweight, :emailadd, :dob, :pob, :gender, :mothername, :motherknownname, :fathername, :fatherknownname, :nameofrel, :indiname, :brothername, :brotherknownname, :sistername, :sisterknownname, :religion, :caste, :subcaste, :mothertongue, :languagesknown, :buss_emp, :hobby, :favouritecolour, :favouritefood, :extracir)";


$stmt = $core->dbh->prepare($q);
$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
$stmt->bindParam(':username', $username ,PDO::PARAM_STR);
$stmt->bindParam(':userknownname', $userknownname ,PDO::PARAM_STR);
$stmt->bindParam(':userdate', $userdate ,PDO::PARAM_STR);
$stmt->bindParam(':city', $city ,PDO::PARAM_STR);
$stmt->bindParam(':state', $state ,PDO::PARAM_STR);
$stmt->bindParam(':country', $country ,PDO::PARAM_STR);
$stmt->bindParam(':phno', $phno ,PDO::PARAM_STR);
$stmt->bindParam(':height', $height ,PDO::PARAM_STR);
$stmt->bindParam(':dheight', $dheight ,PDO::PARAM_STR);
$stmt->bindParam(':weight', $weight ,PDO::PARAM_STR);
$stmt->bindParam(':dweight', $dweight ,PDO::PARAM_STR);
$stmt->bindParam(':emailadd', $emailadd, PDO::PARAM_STR);
$stmt->bindParam(':dob', $dob ,PDO::PARAM_STR);
$stmt->bindParam(':pob', $pob ,PDO::PARAM_STR);
$stmt->bindParam(':gender', $gender ,PDO::PARAM_STR);
$stmt->bindParam(':mothername', $mothername ,PDO::PARAM_STR);
$stmt->bindParam(':motherknownname', $motherknownname ,PDO::PARAM_STR);
$stmt->bindParam(':fathername', $fathername ,PDO::PARAM_STR);
$stmt->bindParam(':fatherknownname', $fatherknownname ,PDO::PARAM_STR);
$stmt->bindParam(':nameofrel', $nameofrel ,PDO::PARAM_STR);
$stmt->bindParam(':indiname', $indiname ,PDO::PARAM_STR);
$stmt->bindParam(':brothername', $brothername, PDO::PARAM_STR);
$stmt->bindParam(':brotherknownname', $brotherknownname, PDO::PARAM_STR);
$stmt->bindParam(':sistername', $sistername, PDO::PARAM_STR);
$stmt->bindParam(':sisterknownname', $sisterknownname, PDO::PARAM_STR);
$stmt->bindParam(':religion', $religion ,PDO::PARAM_STR);
$stmt->bindParam(':caste', $caste ,PDO::PARAM_STR);
$stmt->bindParam(':subcaste', $subcaste, PDO::PARAM_STR);
$stmt->bindParam(':mothertongue', $mothertongue ,PDO::PARAM_STR);
$stmt->bindParam(':languagesknown', $languagesknown ,PDO::PARAM_STR);
$stmt->bindParam(':buss_emp', $buss_emp, PDO::PARAM_STR);
$stmt->bindParam(':hobby', $hobby ,PDO::PARAM_STR);
$stmt->bindParam(':favouritecolour', $favouritecolour ,PDO::PARAM_STR);
$stmt->bindParam(':favouritefood', $favouritefood ,PDO::PARAM_STR);
$stmt->bindParam(':extracir', $extracir ,PDO::PARAM_STR);
$stmt->execute();


?>

<?php

$q1 = "SELECT * FROM personal_details";
$stmt1 = $core->dbh->prepare($q1);
$stmt1->execute();

if($stmt1->rowCount() > 0 )
{
	?>

	<div class="container">
		<table class="table table-bordered table-hover table-sm">
			<header><h3>Personal Details</h3></header>
			<thead>
				<tr>
					<th>SL NO</th>
					<th>USER ID</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Gender</th>
					<th>Religion</th>
					<th>Mother Tongue</th>
					<th>Languages Known</th>
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
							<td><?php echo $r1->userid; ?></td>
							<td><?php echo $r1->username; ?></td>
							<td><?php echo $r1->phno; ?></td>
							<td><?php echo $r1->gender; ?></td>
							<td><?php echo $r1->religion; ?></td>
							<td><?php echo $r1->mothertongue; ?></td>
							<td><?php echo $r1->languagesknown; ?></td>
							<td>
								<a onclick="del('<?php echo $r1->p_id; ?>')">
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