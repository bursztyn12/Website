<?php
$conn = mysqli_connect("18.219.131.60","michal","open","pogoda");
if(!$link){
  echo "<p>Could not connect to the server '" . $hostname . "'</p>\n";
  echo mysql_error();
}else{
  echo "<p>Successfully connected to the server '" . $hostname . "'</p>\n";
  if ($database) {
    $check = mysqli_select_db("$database");
    if (!$check) {
      echo mysql_error();
    }else{
      echo "<p>Successfully connected to the database '" . $database . "'</p>\n";
      $sql = "SHOW TABLES FROM `$database`";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) > 0) {
				echo "<p>Available tables:</p>\n";
				echo "<pre>\n";
				while ($row = mysql_fetch_row($result)) {
					echo "{$row[0]}\n";
				}
				echo "</pre>\n";
			} else {
				echo "<p>The database '" . $database . "' contains no tables.</p>\n";
				echo mysql_error();
			}
    }
  }
}
?>
