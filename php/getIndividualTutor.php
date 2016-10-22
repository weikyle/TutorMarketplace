<?php
require '../../lib/database.php';
if(is_null($_GET["TutorId"])){
	echo "Invalid post parameters";
	exit;
}
$TutorId=$_GET["TutorId"];
$stmt = $mysqli->prepare("SELECT * FROM `Tutors` JOIN `TutorOfferings` on `Tutors`.`UserId`=`TutorOfferings`.`UserId` Where `Tutors`.`UserId`=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('i', $TutorId);
$stmt->execute();
$result = $stmt->get_result();
//$stmt->bind_result($id, $banned,$picture,$bio);
 
 
 //maybe redo this to two querys
 
$tutor=array();
//echo "<ul>\n";
while($row = $result->fetch_assoc()){
	$tutor[]=$row;
}
$tutor["classes"]=array();
/*while($stmt->fetch()){
	$tutor["id"]=$id;
	$tutor["banned"]=$banned;
	$tutor["picture"]=$picture;
	$tutor["bio"]=$bio;
}*/
//echo "</ul>\n";
header('Content-Type: application/json');
echo json_encode($tutor);
$stmt->close();
?>

