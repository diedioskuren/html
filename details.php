<!DOCTYPE html>
<html>
  
<head>

  <style>
   table {
       border-collapse: collapse;
   }

   table, td, th {
       border: 1px solid black;
       font-size:90%;        
   }
   </style>
</head>


<body>

<?php

$mysqli = new mysqli('localhost', 'root', 'mysql', 'hellowork');

if ($mysqli->connect_error) {
    die($mysqli->connect_error);  
} else {
    $mysqli->set_charset('utf8');
}

echo "<table>";

  $sql = 'SELECT a.us_date, a.uuid, a.url, a.title, a.salarylow, a.salaryhigh, b.detail, b.number, b.number_local, a.salarystatus, a.location FROM jobsearch as a, jobdetails as b where a.uuid=b.uuid order by a.us_date desc';


if ($result = $mysqli->query($sql)) {   

    $cnt = 0;
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        echo "<tr>";
        echo "<td>";
        echo ++$cnt;
        echo "</td>";
        echo "<td>";
        echo "<a href='" . $row[2] . "'>" . $row[1] . "</a>";
        echo "</td>";
        echo "<td>";
        echo $row[3] . "\n";
        echo "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "</tr>";

	echo "<tr>";
        echo "<td>";
        echo "</td><td></td>";
        echo "<td colspan=\"3\">";
        echo $row[6];
        echo "</td>";
	echo "</tr>";

        echo "<tr>";
        echo "<td>";
        echo $row[0];
        echo "</td>";
        echo "<td>";
        echo $row[8] . "\n";
        echo "</td>";
        echo "<td>";
        echo $row[7] . "\n";
        echo "</td>";
        echo "<td>" . $row[9] . "</td>";
        echo "<td>" . $row[10] . "</td>";
        echo "</tr>"; 

   }
 
      $result->close();
}
 
echo "</table>";

$mysqli->close();
?>


</body>
</html>
