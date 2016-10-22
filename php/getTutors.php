<?php
require 'database.php';
 
$stmt = $mysqli->prepare("select userI, last_name from employees order by last_name");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();
 
$result = $stmt->get_result();
 
echo "<ul>\n";
while($row = $result->fetch_assoc()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars( $row["first_name"] ),
		htmlspecialchars( $row["last_name"] )
	);
}
echo "</ul>\n";
 
$stmt->close();
?>
