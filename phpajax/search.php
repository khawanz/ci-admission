<?php
 include "db.php";
 
 $judul=$_POST["judul"];
 
  
 $result=mysql_query("SELECT * FROM artikel where judul like '%$judul%' ");
 $found=mysql_num_rows($result);
 
 if($found>0){
    while($row=mysql_fetch_array($result)){
    echo "<li>$row[judul]</br>
            <a href=\"$row[link]\">$row[link]</a></li>";
    }   
 }else{
    echo "<li>Tidak ada artikel yang ditemukan <li>";
 }
?>