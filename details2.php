<?php

header('Content-type: text/plain; charset=UTF-8'); 

$link = mysqli_connect('localhost', 'root', 'mysql', 'hellowork');

mysqli_set_charset($link, 'utf8');

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());  
}
 
if ($result = mysqli_query($link, 'SELECT * from locals')) {
 
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        echo $row[0] . "\n";
	echo $row[1] . "\n";
	echo $row[2] . "\n";
    }
 
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>