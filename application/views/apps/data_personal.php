<?php
$uid = $_POST['uid'];

$data = explode(",", $uid);
echo "<p>Data Pribadi</p>";
foreach($data as $key => $value){
    echo "$key: $value, </br>";
}

